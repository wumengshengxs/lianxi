<?php

class OuterTmp extends IteratorIterator{
    public function current()
    {
        return  parent::current().'tail'; // TODO: Change the autogenerated stub
    }

    public function key()
    {
        return 'pre_'. parent::key(); // TODO: Change the autogenerated stub
    }
}