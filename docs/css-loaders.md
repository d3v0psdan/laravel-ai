# CSS Loaders 

These are CSS loaders I have picked from `https://css-loaders.com/` (great website), in order to make the experience just a little bit more unique.

## `The Hypnotic #3`

```css
/* HTML: <div class="loader"></div> */
.loader {
  width: 50px;
  aspect-ratio: 1;
  border: 2px solid;
  --c:conic-gradient(from -90deg at calc(100% - 2px) calc(100% - 2px),#0000 0 90deg,#000 0);
  background: var(--c),var(--c);
  background-size: 16px 16px;
  background-position: 0 0;
  animation: l3 1s infinite;
}
@keyframes l3{
  100% {background-position: -16px -16px,16px 16px}
}
```

## `The Square #11`
```css
/* HTML: <div class="loader"></div> */
.loader {
  width: 55px;
  aspect-ratio: 1;
  --g1:conic-gradient(from  90deg at top    3px left  3px,#0000 90deg,#fff 0);
  --g2:conic-gradient(from -90deg at bottom 3px right 3px,#0000 90deg,#fff 0);
  background:
    var(--g1),var(--g1),var(--g1),var(--g1), 
    var(--g2),var(--g2),var(--g2),var(--g2);
  background-position: 0 0,100% 0,100% 100%,0 100%;
  background-size: 25px 25px;
  background-repeat: no-repeat;
  animation: l11 1.5s infinite;
}
@keyframes l11 {
  0%   {background-size:35px 15px,15px 15px,15px 35px,35px 35px}
  25%  {background-size:35px 35px,15px 35px,15px 15px,35px 15px}
  50%  {background-size:15px 35px,35px 35px,35px 15px,15px 15px}
  75%  {background-size:15px 15px,35px 15px,35px 35px,15px 35px}
  100% {background-size:35px 15px,15px 15px,15px 35px,35px 35px}
}
```

## `The Dancers #2`
```css
/* HTML: <div class="loader"></div> */
.loader {
  width: 40px;
  aspect-ratio: 1;
  position: relative;
}
.loader:before,
.loader:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  margin: -8px 0 0 -8px;
  width: 16px;
  aspect-ratio: 1;
  background: #3FB8AF;
  animation:
    l2-1 2s  infinite,
    l2-2 1s infinite ;
}
.loader:after {
  background:#FF3D7F;
  animation-delay: -1s,0s;
}
@keyframes l2-1 {
  0%   {top:0   ;left:0}
  25%  {top:100%;left:0}
  50%  {top:100%;left:100%}
  75%  {top:0   ;left:100%}
  100% {top:0   ;left:0}
}
@keyframes l2-2 {
   40%,50% {transform: rotate(0.25turn) scale(0.5)}
   100%    {transform: rotate(0.5turn) scale(1)}
}
```

## `The Eyes #5`
```css
/* HTML: <div class="loader"></div> */
.loader {
  display: inline-flex;
  gap: 10px;
}
.loader:before,
.loader:after {
  content: "";
  height: 20px;
  aspect-ratio: 1;
  border-radius: 50%;
  background:
    radial-gradient(farthest-side,#000 95%,#0000) 35% 35%/6px 6px no-repeat
    #fff;
  animation: l5 3s infinite;
}
@keyframes l5 {
  0%,11%   {background-position:35% 35%}
  14%,36%  {background-position:65% 35%}
  38%,61%  {background-position:65% 65%}
  64%,86%  {background-position:35% 65%}
  88%,100% {background-position:35% 35%}
}
```

## `The Blob #14`
```css
/* HTML: <div class="loader"></div> */
.loader {
  height: 50px;
  aspect-ratio: 2;
  border: 10px solid #000;
  box-sizing: border-box;
  background: 
    radial-gradient(farthest-side,#fff 98%,#0000) left/20px 20px,
    radial-gradient(farthest-side,#fff 98%,#0000) left/20px 20px,
    radial-gradient(farthest-side,#fff 98%,#0000) center/20px 20px,
    radial-gradient(farthest-side,#fff 98%,#0000) right/20px 20px,
    #000;
  background-repeat: no-repeat;
  filter: blur(4px) contrast(10);
  animation: l14 1s infinite;
}
@keyframes l14 {
  100%  {background-position:right,left,center,right}
}
```

## `The Blob #18`
```css
/* HTML: <div class="loader"></div> */
.loader {
  width: 80px;
  aspect-ratio: 1;
  border: 10px solid #000;
  box-sizing: border-box;
  background: 
    radial-gradient(farthest-side at right,#fff 98%,#0000) 20% 50%/40% 80%,
    radial-gradient(farthest-side at left ,#fff 98%,#0000) 80% 50%/40% 80%,
    #000;
  background-repeat: no-repeat;
  filter: blur(4px) contrast(10); 
  animation: l18 0.8s infinite alternate;
}
@keyframes l18 {
  0%,20% {background-position:20% 50%,80% 50%}
  100%   {background-position:80% 50%,20% 50%}
}
```