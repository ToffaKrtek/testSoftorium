<?php
  require_once('Main.php');
  /**
   *
   */
  class Predict extends Main
  {
    public $table_name = "predictions";
    protected $answers = ["Да.", "Нет.", "Возможно.", "Вопрос не ясен.",
                        "Абсолютно точно.", "Никогда.", "Даже не думай.", "Сконцентрируйся и спроси опять."];

    public function AddPredict($question, $user_id )
    {
      $answer = $this->GiveAnswer();
      $sql = "INSERT INTO `$this->table_name`(`question`, `answer`, `user_id`) VALUES( '$question', '$answer', $user_id );";
      $result = $this->Exec($sql);
      return $answer;
    }
    protected function GiveAnswer()
    {
      return $this->answers[array_rand($this->answers)];
    }
    public function GetQuestionAndCount()
    {
      $sql = "SELECT `question`, count(`question`) as 'count' FROM `$this->table_name`  GROUP BY `question` ORDER BY count DESC";
      $result = $this->Exec($sql);
      return $result;
    }
  }
