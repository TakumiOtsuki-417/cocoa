"use strict";

// 常に正円を形成
const circleHeight = ()=>{
  const circles = Array.from(document.getElementsByClassName("act__face"));
  const circle = circles[0];
  const circleWidth = circle.clientWidth;
  circles.forEach(function(c){
    c.style.height = circleWidth + 'px';
  })
};
addEventListener("load", circleHeight);