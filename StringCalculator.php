<?php

//using polymorphism to be able to add new operands as you please

interface OperationInterface
{
    public function evaluate(array $operand = array());
}

class Calculator
{
    protected $operand = array();

    public function setOperand(array $operand = array())
    {
        $this->operand = $operand;
    }

    public function additionoperand($operand)
    {
        $this->operand[] = $operand;
    }

    
    public function setOperation(OperationInterface $operation)
    {
        $this->operation = $operation;
    }

    public function process()
    {
        return $this->operation->evaluate($this->operand);
    }
}

class Addition implements OperationInterface
{
    public function evaluate(array $operand = array())
    {
        return array_sum($operand);
    }
}

$calculator = new Calculator;
$calculator->setOperand(array(4,2));
$calculator->setOperation(new Addition);

echo $calculator->process();