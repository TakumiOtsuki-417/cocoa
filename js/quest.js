"use strict";
/////////////////////////////////
// questに関する答え合わせ処理
////////////////////////////////
const answer = ()=>{
  // 正答を表示させるボタンの格納
  const btn1 = document.getElementById("first-btn");
  console.log(btn1);
  // 正解と解説部分を全て格納
  const secondElements = document.querySelectorAll('.second-content');
  // 最初は正解・解説を非表示
  secondElements.forEach(function(elem){
    elem.style.display = "none";
  });
  // ボタンをクリックした時には...
  btn1.addEventListener('click', function(){
    // ボタンを非表示、正解・解説を表示
    btn1.style.display = "none";
    secondElements.forEach(function(elem){
      elem.style.display = "";
    });
    // 選択肢を全て格納
    const questRadio = document.querySelectorAll('.quest-radio');
    // 選択状況を固定化
    questRadio.forEach(function(elem){
      if(elem.checked == false){
        elem.disabled = true;
      }
    });
    // ワープ場所を設定
    const top = document.querySelector('html');
    top.scrollTop = 0;
  });
  // ボタンクリックの処理、記述ここまで
};

// チェック判定諸々
const countRadio = ()=>{
  // 選択肢を全て格納
  const radios = document.getElementsByClassName("quest-radio");
  // 未チェックが残ってたら表示するやつを格納
  const noCheckMessage = document.getElementById("nocheck-message");
  // 正答を表示させるボタンを格納
  const firstBtn = document.getElementById("first-btn");
  console.log(radios);
  // チェックされてなければならない数
  const countQuest = radios.length / 4;
  // チェックされた数
  let count = 0;
  // チェックされてない数（増えちゃダメなやつ）
  let countNotChecked = 0;
  // 後で特定のnameの選択肢を格納するやつ
  let quest;
  // 後で特定の問題を格納するやつ
  let thisQuest;
  // チェック判定フラグ
  let flag = false;
  // 単一オブジェクトで機能するaddEventLister準備にforで細分化
  // つまりは全選択肢に以下の処理を実装
  for (let j = 0; j < radios.length; j++) {
    // 選択・変更するたびに以下の処理
    radios[j].addEventListener('change', ()=>{
      console.log(radios[j]);
      // 未チェック数を初期化
      countNotChecked = 0;
      // 全ての問題に対して行う処理
      for (let i = 0; i < countQuest; i++) {
        // 変数questにその問題の選択肢を格納
        quest = document.getElementsByName(`score_update[select${i + 1}]`);
        // フラグ初期化
        flag = false;
        // その４択全部に以下の処理
        for (let h = 0; h < 4; h++) {
          // もしチェックされてたらフラグを立てる
          if (quest[h].checked == true){
            flag = true;
          }
        }
        // ４択全部にかける処理ここまで
        // 変数thisQuestにその問題を格納
        thisQuest = document.getElementById(`block-quest-${i + 1}`);
        // もしフラグが立ってない（＝未チェック）場合は増えちゃいけないやつ増加、注意背景
        if (!flag){
          thisQuest.classList.add("no-checked");
          countNotChecked++;
        // OKなら注意背景解除
        } else if (flag && thisQuest.classList.contains("no-checked")) {
          thisQuest.classList.remove("no-checked");
        }
      }
      // 全ての問題に対し行う処理
      // もし変数countNoCheckedが増えちゃってたら...
      if (countNotChecked != 0){
        console.log(countNotChecked);
        // 注意文は表示しておく
        noCheckMessage.style.display = "block";
        // ボタンは非表示にしておく
        firstBtn.style.display = "none";
      // 全ての問題が回答されていたら
      } else {
        // 注意文を解除
        noCheckMessage.style.display = "none";
        // ボタンを召喚
        firstBtn.style.display = "block";
      }
    });
    // 選択・変更のたびに行う処理ここまで
  }
  // 全選択肢の処理ここまで
};

window.addEventListener('load', answer);
window.addEventListener('load', countRadio);