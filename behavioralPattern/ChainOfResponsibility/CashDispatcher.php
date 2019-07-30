<?php
// Chain of Responsibility. Dividing term to OOPs approach. Responsibility === Class.
// CashDispatcher is responsible to divide the requested amount of cash to the number of note values.
// ( simulation for ATM machine cash responser )
// for Eg. if the requested amount is 5732,
// cashDispatcher will be able to dispatche the cash into 5 * 1000, 1 * 500, 2 * 100, 1 * 20 , 1* 10, 1 * 2 
// exceptions. (condition for no note availabe is not handled)
//
class CashDispatcher {  
    // denominator for cash note value
    private $denominator;

    // next for next linked cash dispatcher
    private $next;

    /**
     * construct for CashDispatcher
     *
     * @param integer $val value of cash to be despense
     */
    public function __construct(int $val)
    {
        $this->denominator = $val;
    }

    // Create a chain of Dispatcher. as in link list
    // if the next is set. push the new cash Dispatcher to end of the linked list.
    // recursive behavior
    public function setNextDispatcher( CashDispatcher $d)
    {
        if ($this->next == null) {
            $this->next = $d;
        } else {
            $this->next->setNextDispatcher($d);
        } 
    }

    /**
     * Divide the amount to cash note set
     *
     * @param integer $amount // amount to despense
     * @return void
     */
    public function despense(int $amount) 
    {   
        if ( $amount >= $this->denominator) {
            $countChange = (int) ($amount / $this->denominator);
            $balance = $amount % $this->denominator;
            echo (sprintf(" %s of %s note  \n", $countChange, $this->denominator));

            if ($balance != 0) {
                $this->next->despense($balance);
            }
        } else {
            $this->next->despense($amount);
        }
    }
}