"use strict";

const sceneSet = ()=>{
  const scenes = Array.from(document.getElementsByClassName("scene"));
  let contentsPos;
  let winHeight;
  let scrollTop;
  let showClass = "show";
  let timing = 200;
  scenes.forEach(function(scene){
    winHeight = window.innerHeight;
    window.addEventListener('scroll', function(){
      contentsPos = scene.getBoundingClientRect().top + window.pageYOffset;
      scrollTop = document.documentElement.scrollTop;
      if (scrollTop >= contentsPos - winHeight + timing){
        scene.classList.add(showClass);
      } else {
        scene.classList.remove(showClass);
      }
    });
  });
};
window.addEventListener('load', sceneSet);
// $(function(){
//   $('.contents').each(function(i, elem){
//         // コンテンツの座標を取得
//       var contentsPOS = $(elem).offset().top;
//       $(window).on('load scroll resize', function(){
//           // ぺーじ全体の高さ
//           var winHeight = $(window).height();
//           //スクロール量を取得
//           var scrollTop = $(window).scrollTop();
//           var showClass = 'show';
//           var timing = 100; // 100pxコンテンツが見えたら次のif文がtrue
//           if (scrollTop >= contentsPOS - winHeight + timing){
//             $(elem).addClass(showClass);
//           } else {
//             $(elem).removeClass(showClass);
//           }
//       });
//   });
// });