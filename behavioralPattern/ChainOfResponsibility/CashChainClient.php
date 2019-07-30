<?php

/**
 * CashChainClient is the implemenation of Chain of Responsibility. ( Here the classes for responsiblity is represented by same class but different instances )
 * The task is processed through the list of chain of handlers. */
class CashChainClient {

    protected $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * Execute process consists of the chain of responsibilities to be executed one after another 
     * to finish the task to be done.
     * So the handlers are decoupled with the actual action or function to be done. 
     *
     * @return void
     */
    public function execute()
    {   
        $cashDispenser = new CashDispatcher(1000); 
        $cashDispenser->setNextDispatcher(new CashDispatcher(500));
        $cashDispenser->setNextDispatcher(new CashDispatcher(100));
        $cashDispenser->setNextDispatcher(new CashDispatcher(50));
        $cashDispenser->setNextDispatcher(new CashDispatcher(20));
        $cashDispenser->setNextDispatcher(new CashDispatcher(10));
        $cashDispenser->setNextDispatcher(new CashDispatcher(5));
        $cashDispenser->setNextDispatcher(new CashDispatcher(2));
        $cashDispenser->setNextDispatcher(new CashDispatcher(1));

        $cashDispenser->despense($this->amount);
    }
}