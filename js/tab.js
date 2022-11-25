"use strict";

const tabsystem = ()=>{
  // ８つのタブ格納
  const tabs = Array.from(document.getElementsByClassName("tablist"));
  // コンテンツの検索に使う変数
  let tabContent;
  let thisNum;
  // それぞれのタブにクリックイベント実装
  tabs.forEach(function(tab){
    tab.addEventListener('click', clickTab);
  })
  //クリックイベントの中身
function clickTab(t){
  // 「active」じゃないタブをクリックした場合
  if(!t.target.classList.contains("active")){
    // まず「active」付いてるやつを排除
    tabs.forEach(function(tab){
      if(tab.classList.contains("active")){
        tabContent = Array.from(document.getElementsByClassName("phase-active"));
        tab.classList.remove("active");
        tabContent[0].classList.remove("phase-active");
      }
    })
    // クリックしたタブに紐づくコンテンツを検索
    thisNum = t.target.dataset.tablistnum;
    tabContent = Array.from(document.getElementsByClassName(`phase${thisNum}`));
    // クリックしたタブと連関コンテンツを「active」
    t.target.classList.add("active");
    tabContent[0].classList.add("phase-active");
  }
}

}

window.addEventListener("load", tabsystem);