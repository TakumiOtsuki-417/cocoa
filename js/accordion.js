"use strict";
const accordionSet = ()=>{
  // ノードリストを配列に変換
  const accTtls = Array.from(document.getElementsByClassName('accordion_ttl'));
  let accCnt;
  accTtls.forEach((item) => {
    // 各itemにクリックイベントを付与
    item.addEventListener('click', function(e) {
      // クリックされたらクラス.activeを付与
      e.currentTarget.classList.toggle('active');
      // クリックしたitemの隣接要素を変数に代入（.accordion_cnt）
      accCnt = e.currentTarget.nextElementSibling;
      // .accordion_cntにmax-heightの値があったら
      if (accCnt.style.maxHeight) {
        // max-heightの値をnullにする。0にしてしまうと値が存在することになり、
        // アコーディオンは1回しか機能しない
        accCnt.style.maxHeight = null;
      } else {
        // .accordion_cntにmax-heightの値がなければ、scrollHeightの値を設定
        // scrollHeightは、あふれて画面上に表示されない部分を含めた要素の高さを取得するプロパティ
        // 読み取り専用のプロパティであり、値を変更することはできない。
        accCnt.style.maxHeight = accCnt.scrollHeight + 'px';
      }
    });
  });
};

window.addEventListener('load', accordionSet);