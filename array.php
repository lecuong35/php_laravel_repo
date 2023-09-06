<?php
    class A {
        private $pro = "hello";
        public $hehe = "hi hello";

        private function hello () {
            echo "hello boys";
        }
    };

    class B extends A {
        public function hi () {
            echo "hi boys";
        }
    };

    $b = new B();
    echo $b->hehe;
?>