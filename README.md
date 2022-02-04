<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## MinimumToDo

このアプリはToDoアプリの一種で、「本当に行いことに集中する」というテーマで作成しました。既存のToDoやスケジュールアプリは登録できるタスク数に制限がなく、たくさんのタスクを登録するも結局どれもやらないという経験から作成をスタートしました。アプリの特徴としては、
1.一日３つまでしかタスクを登録できない。
2.その代わりに一つのタスクについて詳細に設定ができる。
3.過去のタスクを閲覧することが可能である。
という３点です。

## 使い方

「タスクの追加」のボタンを押すことでタスクの追加のページに移動します。ここで、実施日、タスクの内容、タスクを行うタイミング、最低限やること（must）、できたらやること（want）、工夫を設定します。
「タスクを行うタイミング」とは一日のいつそのタスクを行うのかです。やる時間を明確にすることでタスクの遂行率を高めます。
「最低限やること（must）」とは、そのタスクの最低限やる量です。例えば、「タスクの内容」が「英語の勉強」であれば、「最低限やること（must）」は「5分」などと設定します。これは最低限やる分量を決めておくことで、タスクの着手のハードルを下げるためのものです。
「できたらやること（want）」は目標の分量です。先ほどの例だと「１時間」などと設定します。
「工夫」とはそのタスクを行うための工夫です。先ほどの例だと「あらかじめ勉強の準備をしておく」などです。他にも「スマホの電源を切る」など、タスクを行うときの障害を取り除くために設定します。
このようにその日にやりたいことを三つまで設定します。
そして、タスクの終了後や一日の終わりにタスクの達成状況を登録します。「できたらやること（want）」を達成できたら達成（want）のボタンを、「できたらやること（want）」はできなかったが「最低限やること（must）」はできた場合は達成（must）のボタンを、そもそもタスクに着手できなかった場合は未達成のボタンを押してください。

使い方のイメージとしては
その日にやりたいこと３つまで登録する⇒一日を過ごす⇒その日の終わりに登録したタスクの達成状況を記録⇒翌日にやりたいことを３つまで設定する
という感じです。

## 過去のタスク

「過去のタスク」のページでは過去のタスクの一覧とその達成状況を確認することができます。達成（want）のタスクは緑色、達成（must）のタスクは黄色、未達成のタスクは赤色で表示されます。
「過去の達成率」のページでは、過去のタスクの達成状況の割合を各月ごとにグラフ化したものを表示しています。こちらも、達成（want）は緑色、達成（must）は黄色、未達成は赤色で表示されます。
記録や達成率の可視化によってモチベーションを高めます。

## よくある質問

Q.過去のタスクの中で、達成状況が変化したタスクがあるため、ステータスの変更をしようとしたができない。
A.そもそも過去のタスクというのは未達成だとしても、終了したタスクであるため、ステータスの変更はできません。
例えば、「あるタスクのmustを完了したためとりあえずmustのボタンを押した。翌日のそのタスクのwantまで達成できたため達成状況を達成（want）にする。」という使い方は想定しておりません。
これはあくまでその日にやりたいことを設定するアプリであるため、実施日が過ぎたタスクはその時点で完結します。

## Author

仲手川樹

e-mail:tatsuki.nakategawa@gmail.com

##利用方法

以下のURLから利用できます。
[https://quiet-shore-99034.herokuapp.com](https://quiet-shore-99034.herokuapp.com)

