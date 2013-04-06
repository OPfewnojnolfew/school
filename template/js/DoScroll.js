/*
@className:DoScroll
@author: yanglongji
@date:2010-11-15
@function: ���һ��ʱ�����һ�Σ�ֻ��װ�����Ϲ�������

	����: containerID	 Ҫ�������������ڵ�������ID
		changeTime	�������ʱ��
		height   Ҫ�������ݵ��ܸ߶�
		perScrollHeight   ÿ�ι����ĸ߶�
	
ʹ��˵������������Ȼ��ͨ��������.start();����
*/

function DoScroll(containerID,changeTime,height,perScrollHeight){
	
	this.start=start;
	this.sInit=sInit;
	this.doScroll=doScroll;
	
	var self=this;
	var o=document.getElementById(containerID);
	var sNum=10;  //����ÿ�η�ת�Ĺ�������
	var sTime=50; //����ÿ�ι�����ʱ��
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