<?php
    class A {
        private $pro = "hello";
        public $hehe = "hi hello";

        public function hello () {
            echo "hello boys";
        }
    };

    class B {
        protected $a;

        public function __contruct(A $a){
            $this->a = $a;
        }
    };

    $a_1 = new A();
    $b_1 = new B($a_1);
    echo $b_1;
?>