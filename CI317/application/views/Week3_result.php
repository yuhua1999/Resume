<?php
echo "執行結果如下：<br>";

if (isset($user_file))
{
    foreach ($user_file as $value)
    {
      echo "帳號：".$value['account']."，姓名：".$value['name']."，建立修改時間：".$value['modify_date']."<br>";
    }
}
elseif(isset($error))
{
    echo $error;
}
elseif(isset($success))
{
    echo $success;
}
else
{
    echo "查無資料。";
}

?>
