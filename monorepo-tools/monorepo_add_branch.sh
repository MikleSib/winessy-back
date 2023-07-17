#!/usr/bin/env bash

# Add repositories to a monorepo from specified remotes with specific branch
# to custom directory in branch destination
# You must first add the remotes by "git remote add <remote-name> <repository-url>" and fetch from them by "git fetch --all"
# It will merge master branches of the monorepo and all remotes together while keeping all current branches in monorepo intact
# If subdirectory is not specified remote name will be used instead
#
# Usage: monorepo_add_branch.sh <remote-name> <remote-branch> <subdirectory> <destination-branch>
#
# Example: monorepo_add_branch.sh universal_notifier feature/microservice-framework apps/notifier application/router-permission-checker

# Check provided arguments
if [ "$#" -lt "4" ]; then
    echo 'Usage: monorepo_add_branch.sh <remote-name> <remote-branch> <subdirectory> <destination-branch>'
    echo 'Example: monorepo_add_branch.sh universal_notifier feature/microservice-framework apps/notifier application/router-permission-checker'
    exit
fi

REMOTE=$1
BRANCH=$2
SUBDIRECTORY=$3
DESTINATION_BRANCH=$4

if [ $REMOTE = "" ]; then
	echo 'parameter REMOTE not found'
	exit
fi
if [ $BRANCH = "" ]; then
	echo 'parameter BRANCH not found'
	exit
fi
if [ $SUBDIRECTORY = "" ]; then
	echo 'parameter SUBDIRECTORY not found'
	exit
fi
if [ $DESTINATION_BRANCH = "" ]; then
	echo 'parameter DESTINATION_BRANCH not found'
	exit
fi


# Get directory of the other scripts
MONOREPO_SCRIPT_DIR=$(dirname "$0")
# Wipe original refs (possible left-over back-up after rewriting git history)
$MONOREPO_SCRIPT_DIR/original_refs_wipe.sh

echo "Building branch '$BRANCH' of the remote '$REMOTE'"
git checkout --detach $REMOTE/$BRANCH
$MONOREPO_SCRIPT_DIR/rewrite_history_into.sh $SUBDIRECTORY
MERGE_REFS="$MERGE_REFS $(git rev-parse HEAD)"
# Wipe the back-up of original history
$MONOREPO_SCRIPT_DIR/original_refs_wipe.sh


# Merge all master branches
COMMIT_MSG="merge multiple repositories into an existing monorepo"$'\n'$'\n'"- merged using: 'monorepo_add.sh $@'"$'\n'"- see https://github.com/shopsys/monorepo-tools"
git checkout $DESTINATION_BRANCH
echo "Merging refs: $MERGE_REFS"
git merge --no-commit -q $MERGE_REFS --allow-unrelated-histories
echo 'Resolving conflicts using trees of all parents'
for REF in $MERGE_REFS; do
    # Add all files from all master branches into index
    # "git read-tree" with multiple refs cannot be used as it is limited to 8 refs
    git ls-tree -r $REF | git update-index --index-info
done
git commit -m "$COMMIT_MSG"
git reset --hard

