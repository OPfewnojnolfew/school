/*
@className:DoScroll
@author: yanglongji
@date:2010-11-15
@function: 间隔一定时间滚动一次，只封装了向上滚动！！

	参数: containerID	 要滚动的内容所在的容器的ID
		changeTime	滚动间隔时间
		height   要滚动内容的总高度
		perScrollHeight   每次滚动的高度
	
使用说明：创建对象，然后通过对象名.start();调用
*/

function DoScroll(containerID,changeTime,height,perScrollHeight){
	
	this.start=start;
	this.sInit=sInit;
	this.doScroll=doScroll;
	
	var self=this;
	var o=document.getElementById(containerID);
	var sNum=10;  //控制每次翻转的滚动字数
	var sTime=50; //控制每次滚动的时间
	var mTop=20; 
	var i=1;
	var cHeight=perScrollHeight/sNum;
	
	function doScroll(){
		o.style.marginTop='-'+(i*cHeight)+'px';
		if(i % sNum != 0){
			setTimeout(function(){self.doScroll();},sTime);
		}else{
			mTop+=perScrollHeight;
			if(mTop>height){
				mTop-=height; 
				i=1;
				o.style.marginTop='0px';
			}
		}
		i++;
	}
	
	function sInit(){
		this.doScroll();
		setTimeout(function(){self.sInit();},changeTime);
	}
	
	function start(){
		setTimeout(function(){self.sInit();},changeTime);
	}
}