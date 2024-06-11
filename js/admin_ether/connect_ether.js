(function(){
    var metamaskConnectionStatus = $("#metamask_connection_status"),
        contractInteractionBlocks = $('.contract_interaction_block'),
        currectChainId = metamaskConnectionStatus.data('chain_id'),
        connectButton = metamaskConnectionStatus.find('#connect_button'),
        showMetamaskConnectionData = function (id, html) {
            metamaskConnectionStatus.find('#' + id).html(html);
        },
        showMetamaskConnectionException = function (id, message) {
            var html = '<p style="color: red">' + message + '</p>';
            showMetamaskConnectionData(id, html);
        },
        showMetamaskConnectionMessage = function (id, message) {
            var html = '<p style="color: green">' + message + '</p>';
            showMetamaskConnectionData(id, html);
        }
    ;
    
    if (!window.ethereum) {
        showMetamaskConnectionException('MetaMask not found');
        return;
    }

    /**********************************************************/
    /* Handle chain (network) and chainChanged (per EIP-1193) */
    /**********************************************************/

    var assertChainIdIsCorrect = false,
        assertAccountConnected = false,
        handleConnectCheckChainId = function (chainId) {
            chainId = ethers.BigNumber.from( chainId ).toString();
            assertChainIdIsCorrect = chainId == currectChainId;
            if (assertChainIdIsCorrect) {
                showMetamaskConnectionMessage('chain_id', `Connected to network ${chainId}`);
            } else {
                showMetamaskConnectionException('chain_id', `Incorrect chainId ${chainId} from Metamask, only ${currectChainId} allowed`);
            }
            updateContractsButtons();
        },
        handleConnectCheckChainIdException = function (err) {
            assertChainIdIsCorrect = false;
            showMetamaskConnectionException('chain_id', err.message);
            updateContractsButtons();
        },
        handleAccountsChanged = function (accounts) {
            assertAccountConnected = accounts.length > 0;
            if (assertAccountConnected) {
                showMetamaskConnectionMessage('account', `Using account ${accounts[0]}`)
            } else {
                showMetamaskConnectionException('account', 'MetaMask accounts disconected')
            }
            updateContractsButtons();
        },
        handleAccountsChangedException = function (err) {
            if (err.code === 4001) {
                // EIP-1193 userRejectedRequest error
                // If this happens, the user rejected the connection request.
                showMetamaskConnectionException('Please connect to MetaMask.')
            } else {
                showMetamaskConnectionException('eth_requestAccounts - ' + err.message)
            }
            assertAccountConnected = false;
            updateContractsButtons();
        },
        updateContractsButtons = function () {
            if (ethereum.isConnected()) {
                connectButton.hide();
            } else {
                connectButton.show();
            }
            if (assertChainIdIsCorrect && assertAccountConnected) {
                contractInteractionBlocks.show();
                // contractInteractionBlocks.each((i) => { $(this).change("disable", disable); });
            } else {
                contractInteractionBlocks.hide();
            }
        }
    ;

    ethereum.on("chainChanged", () => window.location.reload());
    ethereum.on("disconnect", (error) => { showMetamaskConnectionMessage(error.message); });

    ethereum.on("connect", (info) => { handleConnectCheckChainId(info.chainId);});
    ethereum.request({ method: 'eth_chainId' })
        .then(handleConnectCheckChainId)
        .catch(handleConnectCheckChainIdException)
    ;

    ethereum.on("accountsChanged", handleAccountsChanged);
    var connect = function () {
        ethereum.request({ method: "eth_requestAccounts" })
            .then(handleAccountsChanged)
            .catch(handleAccountsChangedException)
        ;
    } ;
    connect();
    connectButton.on('click', connect);

    ethereum.on("message", (message) => console.log(message));


})();


