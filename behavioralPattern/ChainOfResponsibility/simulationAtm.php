<?php

function main() 
{
    $cashChainClient = new CashChainClient(6726);
    $cashChainClient->execute();
}

main();