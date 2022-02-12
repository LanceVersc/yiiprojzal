<?php

    namespace app\models;

    use yii\db\ActiveRecord;

    class Posty extends ActiveRecord
    {
        private $tytul;
        private $opis;
        private $kategoria;

        public function rules(){
            return[
                [['tytul', 'opis', 'kategoria'], 'required']  
            ];
        }
    }

?>