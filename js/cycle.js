/ *！
 * jQuery循環插件（帶轉換定義）
 *示例和文檔：http://jquery.malsup.com/cycle/
 * Copyright（c）2007-2013 M. Alsup
 *版本：3.0.3（2013年7月11日）
 *根據MIT和GPL許可證獲得雙重許可。
 * http://jquery.malsup.com/license.html
 *要求：jQuery v1.7.1或更高版本
 * /
;（function（$，undefined）{
“嚴格使用”;

var ver ='3.0.3';

函數調試（s）{
	如果（$ .fn.cycle.debug）
		日誌（一個或多個）;
}		
函數log（）{
	/ *全局控制台* /
	如果（window.console && console.log）
		console.log（'[cycle]'+ Array.prototype.join.call（arguments，''））;
}
$ .expr ['：']。paused = function（el）{
	返回el.cyclePause;
};


//選項arg可以是...
//數字 - 表示應該對給定的幻燈片索引進行立即轉換
//一個字符串 - 暫停，簡歷，切換，下一個，上一個，停止，銷毀或者過渡效果的名稱（即淡入，縮放，等等）
//一個對象 - 屬性來控制幻燈片
//
// arg2參數可以是...
// fx的名字（只和'options'的數字值一起使用）
//值為true（僅用於第一個arg =='resume'）並指示
/ /恢復應該立即發生（不要等待下一個超時）

$ .fn.cycle = function（options，arg2）{
	var o = {s：this.selector，c：this.context};

	//在1.3+中，我們可以修復就緒狀態下的錯誤
	if（this.length === 0 && options！='stop'）{
		if（！$。isReady && os）{
			日誌（'DOM沒有準備好，排隊幻燈片'）;
			$（function（）{
				$（OS，OC）.cycle（選項，ARG2）;
			}）;
			返回這個;
		}
		//你的DOM準備好了嗎？http://docs.jquery.com/Tutorials:Introducing_$（文件）。就緒（）
		log（'terminating; zero elements found by selector'+（$ .isReady？''''（DOM not ready）'））;
		返回這個;
	}

	//迭代匹配的節點集
	return this.each（function（）{
		var opts = handleArguments（this，options，arg2）;
		如果（opts === false）
			返回;

		opts.updateActivePagerLink = opts.updateActivePagerLink || $ .fn.cycle.updateActivePagerLink;
		
		//停止此容器的現有幻燈片（如果有的話）
		如果（this.cycleTimeout）
			clearTimeout（this.cycleTimeout）;
		this.cycleTimeout = this.cyclePause = 0;
		this.cycleStop = 0; //問題＃108

		var $ cont = $（this）;
		var $ slides = opts.slideExpr？$（opts.slideExpr，this）：$ cont.children（）;
		var els = $ slides.get（）;

		if（els.length <2）{
			日誌（'終止;太少的幻燈片：'+ els.length）;
			返回;
		}

		var opts2 = buildOptions（$ cont，$ slides，els，opts，o）;
		如果（opts2 === false）
			返回;

		var startTime = opts2.continuous？10：getTimeout（els [opts2.currSlide]，els [opts2.nextSlide]，opts2，！opts2.backwards）;

		//如果是自動幻燈片播放，請啟動它
		if（startTime）{
			startTime + =（opts2.delay || 0）;
			如果（startTime <10）
				startTime = 10;
			調試（'第一個超時：'+ startTime）;
			this.cycleTimeout = setTimeout（function（）{go（els，opts2,0，！opts.backwards）;}，startTime）;
		}
	}）;
};

函數triggerPause（cont，byHover，onPager）{
	var opts = $（cont）.data（'cycle.opts'）;
	如果（！opts）
		返回;
	var paused = !! cont.cyclePause;
	如果（暫停&& opts.paused）
		opts.paused（續，opts，byHover，onPager）;
	否則，如果（！paused && opts.resumed）
		opts.resumed（續，opts，byHover，onPager）;
}

//處理傳遞給插件fn的參數
函數handleArguments（cont，options，arg2）{
	if（cont.cycleStop === undefined）
		cont.cycleStop = 0;
	if（options === undefined || options === null）
		options = {};
	if（options.constructor == String）{
		開關（選項）{
		案例“摧毀”：
		案例“停止”：
			var opts = $（cont）.data（'cycle.opts'）;
			如果（！opts）
				返回false;
			cont.cycleStop ++; / /回調尋找改變
			如果（cont.cycleTimeout）
				clearTimeout（cont.cycleTimeout）;
			cont.cycleTimeout = 0;
			如果（opts.elements）
				$（opts.elements）.stop（）;
			$（續）.removeData（'cycle.opts'）;
			如果（選項=='摧毀'）
				破壞（續，選擇）;
			返回false;
		案例“切換”：
			cont.cyclePause =（cont.cyclePause === 1）？0：1;
			checkInstantResume（cont.cyclePause，arg2，cont）;
			triggerPause（續）;
			返回false;
		案例“暫停”：
			cont.cyclePause = 1;
			triggerPause（續）;
			返回false;
		案例“簡歷”：
			cont.cyclePause = 0;
			checkInstantResume（false，arg2，cont）;
			triggerPause（續）;
			返回false;
		案例'prev'：
		案例“下一個”：
			opts = $（cont）.data（'cycle.opts'）;
			如果（！opts）{
				日誌（'選項未找到，“prev / next”忽略“）;
				返回false;
			}
			如果（typeof arg2 =='string'） 
				opts.oneTimeFx = arg2;
			$ .fn.cycle [選項（OPTS）;
			返回false;
		默認：
			options = {fx：options};
		}
		退貨選項;
	}
	else if（options.constructor == Number）{
		//去請求的幻燈片
		var num = options;
		options = $（cont）.data（'cycle.opts'）;
		如果（！選項）{
			日誌（'選項未找到，不能前進幻燈片'）;
			返回false;
		}
		if（num <0 || num> = options.elements.length）{
			日誌（'無效幻燈片索引：'+數量）;
			返回false;
		}
		options.nextSlide = num;
		if（cont.cycleTimeout）{
			clearTimeout（cont.cycleTimeout）;
			cont.cycleTimeout = 0;
		}
		如果（typeof arg2 =='string'）
			options.oneTimeFx = arg2;
		去（options.elements，options，1，num> = options.currSlide）;
		返回false;
	}
	退貨選項;
	
	函數checkInstantResume（isPaused，arg2，cont）{
		如果（！isPaused && arg2 ===真）{//現在恢復！
			var options = $（cont）.data（'cycle.opts'）;
			如果（！選項）{
				日誌（'選項未找到，無法恢復'）;
				返回false;
			}
			if（cont.cycleTimeout）{
				clearTimeout（cont.cycleTimeout）;
				cont.cycleTimeout = 0;
			}
			去（options.elements，選項，1，！options.backwards）;
		}
	}
}

函數removeFilter（el，opts）{
	if（！$。support.opacity && opts.cleartype && el.style.filter）{
		嘗試{el.style.removeAttribute（'filter'）; }
		趕上（窒息）{} / /處理舊的歌劇版本
	}
}

//解除綁定事件處理程序
函數破壞（cont，opts）{
	如果（opts.next）
		$（opts.next）.unbind（opts.prevNextEvent）;
	如果（opts.prev）
		$（opts.prev）.unbind（opts.prevNextEvent）;
	
	如果（opts.pager || opts.pagerAnchorBuilder）
		$ .each（opts.pagerAnchors || []，function（）{
			。this.unbind（）除去（）;
		}）;
	opts.pagerAnchors = null;
	$（cont）.unbind（'mouseenter.cycle mouseleave.cycle'）;
	如果（opts.destroy）//回調
		opts.destroy（OPTS）;
}

//一次性初始化
函數buildOptions（$ cont，$ slides，els，options，o）{
	var startingSlideSpecified;
	//支持元數據插件（v1.0和v2.0）
	var opts = $ .extend（{}，$ .fn.cycle.defaults，options || {}，$ .metadata？$ cont.metadata（）：$ .meta？$ cont.data（）：{}）;
	var meta = $ .isFunction（$ cont.data）？$ cont.data（opts.metaAttr）：null;
	如果（meta）
		opts = $ .extend（opts，meta）;
	如果（opts.autostop）
		opts.countdown = opts.autostopCount || els.length;

	var cont = $ cont [0];
	$ cont.data（'cycle.opts'，opts）;
	opts。$ cont = $ cont;
	opts.stopCount = cont.cycleStop;
	opts.elements = els;
	opts.before = opts.before？[opts.before]：[];
	opts.after = opts.after？[opts.after]：[];

	//在回調之後推一些
	如果（！$。support.opacity && opts.cleartype）
		opts.after.push（function（）{removeFilter（this，opts）;}）;
	如果（opts.continuous）
		opts.after.push（function（）{go（els，opts，0，！opts.backwards）;}）;

	saveOriginalOpts（OPTS）;

	// clearType更正
	如果（！$。support.opacity && opts.cleartype &&！opts.cleartypeNoBg）
		clearTypeFix（$幻燈片）;

	//容器需要非靜態位置，以便幻燈片可以位於其中
	if（$ cont.css（'position'）=='static'）
		$ cont.css（'position'，'relative'）;
	如果（opts.width）
		$ cont.width（opts.width）;
	如果（opts.height && opts.height！='auto'）
		$ cont.height（opts.height）;

	if（opts.startingSlide！== undefined）{
		opts.startingSlide = parseInt（opts.startingSlide，10）;
		如果（opts.startingSlide> = els.length || opts.startSlide <0）
			opts.startingSlide = 0; //捕獲假輸入
		其他 
			startingSlideSpecified = true;
	}
	否則，如果（opts.backwards）
		opts.startingSlide = els.length  -  1;
	其他
		opts.startingSlide = 0;

	//如果是隨機的，混合幻燈片數組
	if（opts.random）{
		opts.randomMap = [];
		for（var i = 0; i <els.length; i ++）
			opts.randomMap.push（ⅰ）;
		opts.randomMap.sort（function（a，b）{return Math.random（） -  0.5;}）;
		if（startingSlideSpecified）{
			//嘗試找到指定的開始幻燈片，如果找到相應地設置開始幻燈片索引
			for（var cnt = 0; cnt <els.length; cnt ++）{
				如果（opts.startingSlide == opts.randomMap [cnt]）{
					opts.randomIndex = cnt;
				}
			}
		}
		else {
			opts.randomIndex = 1;
			opts.startingSlide = opts.randomMap [1];
		}
	}
	else if（opts.startingSlide> = els.length）
		opts.startingSlide = 0; //捕獲假輸入
	opts.currSlide = opts.startingSlide || 0;
	var first = opts.startingSlide;

	//在所有幻燈片上設置位置和zIndex
	$ slides.css（{position：'absolute'，top：0，left：0}）。hide（）。each（function（i）{
		var z;
		如果（opts.backwards）
			z =第一？我<=第一？els.length +（i-first）：first-i：els.length-i;
		其他
			z =第一？我> =第一？els.length  - （i-first）：first-i：els.length-i;
		$（this）.css（'z-index'，z）;
	}）;

	//確保第一張幻燈片是可見的
	$（ELS [第一]）的CSS（'不透明度'，1）.show（）; / /不透明位需要處理重新啟動用例
	removeFilter（els [first]，opts）;

	//拉伸幻燈片
	if（opts.fit）{
		if（！opts.aspect）{
	        如果（opts.width）
	            $ slides.width（opts.width）;
	        如果（opts.height && opts.height！='auto'）
	            $ slides.height（opts.height）;
		} else {
			$ slides.each（函數（）{
				var $ slide = $（this）;
				var ratio =（opts.aspect === true）？$ slide.width（）/ $ slide.height（）：opts.aspect;
				if（opts.width && $ slide.width（）！= opts.width）{
					$ slide.width（opts.width）;
					$ slide.height（opts.width / ratio）;
				}

				if（opts.height && $ slide.height（）<opts.height）{
					$ slide.height（opts.height）;
					$ slide.width（opts.height * ratio）;
				}
			}）;
		}
	}

	if（opts.center &&（（！opts.fit）|| opts.aspect））{
		$ slides.each（函數（）{
			var $ slide = $（this）;
			$ slide.css（{
				“margin-left”：opts.width？
					（（opts.width  -  $ slide.width（））/ 2）+“px”：
					0，
				“margin-top”：opts.height？
					（（opts.height  -  $ slide.height（））/ 2）+“px”：
					0
			}）;
		}）;
	}

	if（opts.center &&！opts.fit &&！opts.slideResize）{
		$ slides.each（函數（）{
			var $ slide = $（this）;
			$ slide.css（{
				“margin-left”：opts.width？（（opts.width  -  $ slide.width（））/ 2）+“px”：0，
				“margin-top”：opts.height？（（opts.height  -  $ slide.height（））/ 2）+“px”：0
			}）;
		}）;
	}
		
	//拉伸容器
	var reshape =（opts.containerResize || opts.containerResizeHeight）&& $ cont.innerHeight（）<1;
	如果（重塑）{/ /只有當容器沒有大小http://tinyurl.com/da2oa9這樣做
		var maxw = 0，maxh = 0;
		for（var j = 0; j <els.length; j ++）{
			var $ e = $（els [j]），e = $ e [0]，w = $ e.outerWidth（），h = $ e.outerHeight（）;
			如果（！w）w = e.offsetWidth || e.width || $ e.attr（'寬度'）;
			如果（！h）h = e.offsetHeight || e.height || $ e.attr（'高度'）;
			maxw = w> maxw？w：maxw;
			maxh = h> maxh？h：maxh;
		}
		如果（opts.containerResize && maxw> 0 && maxh> 0）
			$ cont.css（{寬度：maxw +'像素'，高度：MAXH +'像素'}）;
		如果（opts.containerResizeHeight && maxh> 0）
			$ cont.css（{高度：MAXH +'像素'}）;
	}

	var pauseFlag = false; // https://github.com/malsup/cycle/issues/44
	如果（opts.pause）
		$ cont.bind（'mouseenter.cycle'，function（）{
			pauseFlag = true;
			this.cyclePause ++;
			triggerPause（cont，true）;
		}）。bind（'mouseleave.cycle'，function（）{
				如果（pauseFlag）
					this.cyclePause--;
				triggerPause（cont，true）;
		}）;

	如果（supportMultiTransitions（opts）=== false）
		返回false;

	//顯然很多人在圖像上使用圖像幻燈片而沒有高度/寬度屬性。
	// Cycle 2.50+需要每個幻燈片的尺寸信息; 這個塊試圖解決這個問題。
	var requeue = false;
	options.requeueAttempts = options.requeueAttempts || 0;
	$ slides.each（function（）{
		//嘗試獲取每張幻燈片的高度/寬度
		var $ el = $（this）;
		this.cycleH =（opts.fit && opts.height）？opts.height：（$ el.height（）|| this.offsetHeight || this.height || $ el.attr（'height'）|| 0）;
		this.cycleW =（opts.fit && opts.width）？opts.width：（$ el.width（）|| this.offsetWidth || this.width || $ el.attr（'width'）|| 0）;

		if（$ el.is（'img'））{
			var loading =（this.cycleH === 0 && this.cycleW === 0 &&！this.complete）;
			//不要求仍在加載但具有有效大小的圖像
			如果（加載）{
				如果（os && opts.requeueOnImageNotLoaded && ++ options.requeueAttempts <100）{//跟踪重試計數，所以我們不會永遠循環
					log（options.requeueAttempts，' -  img slide not loaded，requeuing slideshow：'，this.src，this.cycleW，this.cycleH）;
					setTimeout（function（）{$（os，oc）.cycle（options）;}，opts.requeueTimeout）;
					requeue = true;
					返回false; //破壞每個循環
				}
				else {
					日誌（'無法確定圖像的大小：'+ this.src，this.cycleW，this.cycleH）;
				}
			}
		}
		返回true;
	}）;

	如果（請求）
		返回false;

	opts.cssBefore = opts.cssBefore || {};
	opts.cssAfter = opts.cssAfter || {};
	opts.cssFirst = opts.cssFirst || {};
	opts.animIn = opts.animIn || {};
	opts.animOut = opts.animOut || {};

	$ slides.not（'：當量（'+第一+'）'）的CSS（opts.cssBefore）;
	$（$幻燈片[第一]）的CSS（opts.cssFirst）;

	if（opts.timeout）{
		opts.timeout = parseInt（opts.timeout，10）;
		//確保超時和速度設置正常
		如果（opts.speed.constructor == String）
			opts.speed = $ .fx.speeds [opts.speed] || parseInt函數（opts.speed，10）;
		如果（！opts.sync）
			opts.speed = opts.speed / 2;
		
		var buffer = opts.fx =='none'？0：opts.fx =='shuffle'？500：250;
		while（（opts.timeout  -  opts.speed）<buffer）//清理超時
			opts.timeout + = opts.speed;
	}
	如果（opts.easing）
		opts.easeIn = opts.easeOut = opts.easing;
	如果（！opts.speedIn）
		opts.speedIn = opts.speed;
	如果（！opts.speedOut）
		opts.speedOut = opts.speed;

	opts.slideCount = els.length;
	opts.currSlide = opts.lastSlide = first;
	if（opts.random）{
		如果（++ opts.randomIndex == els.length）
			opts.randomIndex = 0;
		opts.nextSlide = opts.randomMap [opts.randomIndex];
	}
	否則，如果（opts.backwards）
		opts.nextSlide = opts.startingSlide === 0？（els.length-1）：opts.startingSlide-1;
	其他
		opts.nextSlide = opts.startingSlide> =（els.length-1）？0：opts.startingSlide + 1;

	//運行轉換init fn
	如果（！opts.multiFx）{
		var init = $ .fn.cycle.transitions [opts.fx];
		if（$ .isFunction（init））
			init（$ cont，$ slides，opts）;
		else if（opts.fx！='custom'&&！opts.multiFx）{
			log（'unknown transition：'+ opts.fx，'; slideshow terminated'）;
			返回false;
		}
	}

	//火人造事件
	var e0 = $ slides [first];
	如果（！opts.skipInitializationCallbacks）{
		如果（opts.before.length）
			opts.before [0] .apply（e0，[e0，e0，opts，true]）;
		如果（opts.after.length）
			opts.after [0] .apply（e0，[e0，e0，opts，true]）;
	}
	如果（opts.next）
		$（opts.next）.bind（opts.prevNextEvent，function（）{return advance（opts，1）;}）;
	如果（opts.prev）
		$（opts.prev）.bind（opts.prevNextEvent，function（）{return advance（opts，0）;}）;
	如果（opts.pager || opts.pagerAnchorBuilder）
		buildPager（ELS，選擇採用）;

	exposeAddSlide（opts，els）;

	返回選擇;
}

//保存原始選擇，這樣我們可以在清除狀態後恢復
函數saveOriginalOpts（opts）{
	opts.original = {before：[]，after：[]};
	opts.original.cssBefore = $ .extend（{}，opts.cssBefore）;
	opts.original.cssAfter = $ .extend（{}，opts.cssAfter）;
	opts.original.animIn = $ .extend（{}，opts.animIn）;
	opts.original.animOut = $ .extend（{}，opts.animOut）;
	$ .each（opts.before，function（）{opts.original.before.push（this）;}）;
	$ .each（opts.after，function（）{opts.original.after.push（this）;}）;
}

函數supportMultiTransitions（opts）{
	var i，tx，txs = $ .fn.cycle.transitions;
	//尋找多重效果
	if（opts.fx.indexOf（'，'）> 0）{
		opts.multiFx = true;
		opts.fxs = opts.fx.replace（/ \ s * / g，''）。split（'，'）;
		/ /丟棄任何虛假的效果名稱
		for（i = 0; i <opts.fxs.length; i ++）{
			var fx = opts.fxs [i];
			tx = txs [fx];
			if（！tx ||！txs.hasOwnProperty（fx）||！$ isFunction（tx））{
				log（'丟棄未知的轉換：'，fx）;
				opts.fxs.splice（I，1）;
				一世 - ;
			}
		}
		//如果我們有一個空的列表，那麼我們扔掉一切！
		if（！opts.fxs.length）{
			日誌（'沒有有效的轉換命名;幻燈片終止'）;
			返回false;
		}
	}
	else if（opts.fx =='all'）{//自動生成轉換列表
		opts.multiFx = true;
		opts.fxs = [];
		for（var p in txs）{
			if（txs.hasOwnProperty（p））{
				tx = txs [p];
				if（txs.hasOwnProperty（p）&& $ .isFunction（tx））
					opts.fxs.push（P）;
			}
		}
	}
	if（opts.multiFx && opts.randomizeEffects）{
		//使用fxs數組來隨機選擇效果
		var r1 = Math.floor（Math.random（）* 20）+ 30;
		for（i = 0; i <r1; i ++）{
			var r2 = Math.floor（Math.random（）* opts.fxs.length）;
			opts.fxs.push（opts.fxs.splice（R2,1）[0]）;
		}
		調試（“隨機fx序列：”，opts.fxs）;
	}
	返回true;
}

//提供幻燈片播放開始後添加幻燈片的機制
函數exposeAddSlide（opts，els）{
	opts.addSlide = function（newSlide，prepend）{
		var $ s = $（newSlide），s = $ s [0];
		如果（！opts.autostopCount）
			opts.countdown ++;
		ELS [前置'不印字'：“推”？]（S）;
		如果（opts.els）
			opts.els [前置'不印字'：“推”？]（S）; // shuffle需要這個
		opts.slideCount = els.length;

		//將幻燈片添加到隨機地圖和度假村
		if（opts.random）{
			opts.randomMap.push（opts.slideCount-1）;
			opts.randomMap.sort（function（a，b）{return Math.random（） -  0.5;}）;
		}

		$ s.css（'位置'，'絕對'）;
		$ S [？前置'prependTo'：'appendTo']（OPTS $續）;

		if（prepend）{
			opts.currSlide ++;
			opts.nextSlide ++;
		}

		如果（！$。support.opacity && opts.cleartype &&！opts.cleartypeNoBg）
			clearTypeFix（$ S）;

		如果（opts.fit && opts.width）
			$ s.width（opts.width）;
		如果（opts.fit && opts.height && opts.height！='auto'）
			$ s.height（opts.height）;
		s.cycleH =（opts.fit && opts.height）？opts.height：$ s.height（）;
		s.cycleW =（opts.fit && opts.width）？opts.width：$ s.width（）;

		$ s.css（opts.cssBefore）;

		如果（opts.pager || opts.pagerAnchorBuilder）
			$ .fn.cycle.createPagerAnchor（els.length-1，s，$（opts.pager），els，opts）;

		if（$ .isFunction（opts.onAddSlide））
			opts.onAddSlide（$ S）;
		其他
			$ s.hide（）; //默認行為
	};
}

//重置內部狀態; 為了支持多種效果，我們在每一個關口都這樣做
$ .fn.cycle.resetState = function（opts，fx）{
	fx = fx || opts.fx;
	opts.before = []; opts.after = [];
	opts.cssBefore = $ .extend（{}，opts.original.cssBefore）;
	opts.cssAfter = $ .extend（{}，opts.original.cssAfter）;
	opts.animIn = $ .extend（{}，opts.original.animIn）;
	opts.animOut = $ .extend（{}，opts.original.animOut）;
	opts.fxFn = null;
	$ .each（opts.original.before，function（）{opts.before.push（this）;}）;
	$ .each（opts.original.after，function（）{opts.after.push（this）;}）;

	//重新初始化
	var init = $ .fn.cycle.transitions [fx];
	if（$ .isFunction（init））
		init（opts。$ cont，$（opts.elements），opts）;
};

//這是主引擎fn，它處理超時，回調和幻燈片索引mgmt
功能go（els，opts，manual，fwd）{
	var p = opts。$ cont [0]，curr = els [opts.currSlide]，next = els [opts.nextSlide];

	// opts.busy是真的，如果我們在動畫的中間
	if（manual && opts.busy && opts.manualTrump）{
		/ /讓手動轉換請求王牌活躍的
		調試（'手動轉到go（），停止活動轉換'）;
		$（ELS）.stop（真，真）;
		opts.busy = 0;
		clearTimeout（p.cycleTimeout）;
	}

	//如果有一個活動，則不會開始另一個基於超時的轉換
	if（opts.busy）{
		調試（'轉換激活，忽略新的tx請求'）;
		返回;
	}


	如果我們有一個突出的停止請求，//停止循環
	if（p.cycleStop！= opts.stopCount || p.cycleTimeout === 0 &&！manual）
		返回;

	//檢查我們是否應該基於autostop選項停止騎車
	if（！manual &&！p.cyclePause &&！opts.bounce &&
		（（opts.autostop &&（--opts.countdown <= 0））||
		（opts.nowrap &&！opts.random && opts.nextSlide <opts.currSlide）））{
		如果（opts.end）
			opts.end（OPTS）;
		返回;
	}

	//如果幻燈片暫停，只能在手動觸發器上進行轉換
	var changed = false;
	if（（manual ||！p.cyclePause）&&（opts.nextSlide！= opts.currSlide））{
		改變=真;
		var fx = opts.fx;
		/ /如果我們還沒有嘗試獲得幻燈片的大小
		curr.cycleH = curr.cycleH || $（CURR）.height（）;
		curr.cycleW = curr.cycleW || $（CURR）.WIDTH（）;
		next.cycleH = next.cycleH || $（下）.height（）;
		next.cycleW = next.cycleW || $（下）.WIDTH（）;

		//支持多種轉換類型
		if（opts.multiFx）{
			if（fwd &&（opts.lastFx === undefined || ++ opts.lastFx> = opts.fxs.length））
				opts.lastFx = 0;
			else if（！fwd &&（opts.lastFx === undefined || --opts.lastFx <0））
				opts.lastFx = opts.fxs.length  -  1;
			fx = opts.fxs [opts.lastFx];
		}

		//一次fx覆蓋適用於：$（'div'）。cycle（3，'zoom'）;
		if（opts.oneTimeFx）{
			fx = opts.oneTimeFx;
			opts.oneTimeFx = null;
		}

		$ .fn.cycle.resetState（opts，fx）;

		//運行之前的回調
		如果（opts.before.length）
			$ .each（opts.before，function（i，o）{
				if（p.cycleStop！= opts.stopCount）return;
				o.apply（next，[curr，next，opts，fwd]）;
			}）;

		/ /階段後callacks
		var after = function（）{
			opts.busy = 0;
			$ .each（opts.after，function（i，o）{
				if（p.cycleStop！= opts.stopCount）return;
				o.apply（next，[curr，next，opts，fwd]）;
			}）;
			if（！p.cycleStop）{
				//排隊下一個轉換
				queueNext（）;
			}
		};

		debug（'tx firing（'+ fx +'）; currSlide：'+ opts.currSlide +'; nextSlide：'+ opts.nextSlide）;
		
		//準備好執行轉換
		opts.busy = 1;
		如果（opts.fxFn）// fx函數提供？
			opts.fxFn（curr，next，opts，after，fwd，manual && opts.fastOnEvent）;
		else if（$ .isFunction（$ .fn.cycle [opts.fx]））// fx插件？
			$ .fn.cycle [opts.fx]（curr，next，opts，after，fwd，manual && opts.fastOnEvent）;
		其他
			$ .fn.cycle.custom（curr，next，opts，after，fwd，manual && opts.fastOnEvent）;
	}
	else {
		queueNext（）;
	}

	if（changed || opts.nextSlide == opts.currSlide）{
		//計算下一張幻燈片
		var roll;
		opts.lastSlide = opts.currSlide;
		if（opts.random）{
			opts.currSlide = opts.nextSlide;
			如果（++ opts.randomIndex == els.length）{
				opts.randomIndex = 0;
				opts.randomMap.sort（function（a，b）{return Math.random（） -  0.5;}）;
			}
			opts.nextSlide = opts.randomMap [opts.randomIndex];
			如果（opts.nextSlide == opts.currSlide）
				opts.nextSlide =（opts.currSlide == opts.slideCount  -  1）？0：opts.currSlide + 1;
		}
		else if（opts.backwards）{
			roll =（opts.nextSlide  -  1）<0;
			如果（roll && opts.bounce）{
				opts.backwards =！opts.backwards;
				opts.nextSlide = 1;
				opts.currSlide = 0;
			}
			else {
				opts.nextSlide = roll？（els.length-1）：opts.nextSlide-1;
				opts.currSlide = roll？0：opts.nextSlide + 1;
			}
		}
		其他{//序列
			roll =（opts.nextSlide + 1）== els.length;
			如果（roll && opts.bounce）{
				opts.backwards =！opts.backwards;
				opts.nextSlide = els.length-2;
				opts.currSlide = els.length-1;
			}
			else {
				opts.nextSlide = roll？0：opts.nextSlide + 1;
				opts.currSlide = roll？els.length-1：opts.nextSlide-1;
			}
		}
	}
	如果（更改&& opts.pager）
		opts.updateActivePagerLink（opts.pager，opts.currSlide，opts.activePagerClass）;
	
	函數queueNext（）{
		//下一個轉換
		var ms = 0，timeout = opts.timeout;
		if（opts.timeout &&！opts.continuous）{
			ms = getTimeout（els [opts.currSlide]，els [opts.nextSlide]，opts，fwd）;
         如果（opts.fx =='shuffle'）
            ms  -  = opts.speedOut;
      }
		否則，如果（opts.continuous && p.cyclePause）//連續顯示後回調工作，而不是這個計時器邏輯
			ms = 10;
		如果（ms> 0）
			p.cycleTimeout = setTimeout（function（）{go（els，opts，0，！opts.backwards）;}，ms）;
	}
}

//在轉換之後調用
$ .fn.cycle.updateActivePagerLink =函數（pager，currSlide，clsName）{
   $（pager）.each（function（）{
       $（本）。兒童（）removeClass（clsName）.EQ（currSlide）.addClass（clsName）;
   }）;
};

//計算當前轉換的超時值
函數getTimeout（curr，next，opts，fwd）{
	if（opts.timeoutFn）{
		//調用用戶提供的calc fn
		var t = opts.timeoutFn.call（curr，curr，next，opts，fwd）;
		while（opts.fx！='none'&&（t  -  opts.speed）<250）//清理超時
			t + = opts.speed;
		debug（'calculated timeout：'+ t +'; speed：'+ opts.speed）;
		if（t！== false）
			返回t;
	}
	返回opts.timeout;
}

//暴露next / prev函數，調用者必須通過狀態
$ .fn.cycle.next = function（opts）{advance（opts，1）; };
$ .fn.cycle.prev = function（opts）{advance（opts，0）;};

//向前或向後滑動
函數advance（opts，moveForward）{
	var val = moveForward？1：-1;
	var els = opts.elements;
	var p = opts。$ cont [0]，timeout = p.cycleTimeout;
	如果（超時）{
		clearTimeout（超時）;
		p.cycleTimeout = 0;
	}
	if（opts.random && val <0）{
		//移回到先前顯示的幻燈片
		opts.randomIndex--;
		如果（--opts.randomIndex == -2）
			opts.randomIndex = els.length-2;
		else if（opts.randomIndex == -1）
			opts.randomIndex = els.length-1;
		opts.nextSlide = opts.randomMap [opts.randomIndex];
	}
	else if（opts.random）{
		opts.nextSlide = opts.randomMap [opts.randomIndex];
	}
	else {
		opts.nextSlide = opts.currSlide + val;
		if（opts.nextSlide <0）{
			如果（opts.nowrap）返回false;
			opts.nextSlide = els.length  -  1;
		}
		else if（opts.nextSlide> = els.length）{
			如果（opts.nowrap）返回false;
			opts.nextSlide = 0;
		}
	}

	var cb = opts.onPrevNextEvent || opts.prevNextClick; // prevNextClick已被棄用
	如果（$ .isFunction（cb））
		cb（val> 0，opts.nextSlide，els [opts.nextSlide]）;
	去（els，opts，1，moveForward）;
	返回false;
}

函數buildPager（els，opts）{
	var $ p = $（opts.pager）;
	$ .each（els，function（i，o）{
		$ .fn.cycle.createPagerAnchor（I，O，$ P，ELS，選擇採用）;
	}）;
	opts.updateActivePagerLink（opts.pager，opts.startingSlide，opts.activePagerClass）;
}

$ .fn.cycle.createPagerAnchor = function（i，el，$ p，els，opts）{
	var a;
	if（$ .isFunction（opts.pagerAnchorBuilder））{
		a = opts.pagerAnchorBuilder（i，el）;
		debug（'pagerAnchorBuilder（'+ i +'，el）返回：'+ a）;
	}
	其他
		a ='<a href="#">'+（i + 1）+'</a>';
		
	如果一個）
		返回;
	var $ a = $（a）;
	//如果錨點在dom中，則不要重新排序
	if（$ a.parents（'body'）。length === 0）{
		var arr = [];
		if（$ p.length> 1）{
			$ p.each（function（）{
				var $ clone = $ a.clone（true）;
				$（本）.append（$克隆）;
				arr.push（$克隆[0]）;
			}）;
			$ a = $（arr）;
		}
		else {
			$ a.appendTo（$ P）;
		}
	}

	opts.pagerAnchors = opts.pagerAnchors || [];
	opts.pagerAnchors.push（$ A）;
	
	var pagerFn = function（e）{
		e.preventDefault（）;
		opts.nextSlide = i;
		var p = opts。$ cont [0]，timeout = p.cycleTimeout;
		如果（超時）{
			clearTimeout（超時）;
			p.cycleTimeout = 0;
		}
		var cb = opts.onPagerEvent || opts.pagerClick; // pagerClick已被棄用
		如果（$ .isFunction（cb））
			cb（opts.nextSlide，els [opts.nextSlide]）;
		去（els，opts，1，opts.currSlide <i）; //觸發反式
//返回false; // <==允許泡泡
	};
	
	if（/mouseenter|mouseover/i.test(opts.pagerEvent））{
		$ a.hover（pagerFn，function（）{/ * no-op * /}）;
	}
	else {
		$ a.bind（opts.pagerEvent，pagerFn）;
	}
	
	if（！/^click/.test(opts.pagerEvent）&&！opts.allowPagerClickBubble）
		$ a.bind（'click.cycle'，function（）{return false;}）; / /抑制點擊
	
	var cont = opts。$ cont [0];
	var pauseFlag = false; // https://github.com/malsup/cycle/issues/44
	如果（opts.pauseOnPagerHover）{
		$ a.hover（
			function（）{ 
				pauseFlag = true;
				cont.cyclePause ++; 
				triggerPause（續，真實，TRUE）;
			}，function（）{ 
				如果（pauseFlag）
					cont.cyclePause--; 
				triggerPause（續，真實，TRUE）;
			} 
		）;
	}
};

// helper fn來計算當前和下一個之間的幻燈片數量
$ .fn.cycle.hopsFromLast = function（opts，fwd）{
	var hops，l = opts.lastSlide，c = opts.currSlide;
	如果（fwd）
		hops = c> l？c  -  l：opts.slideCount  -  l;
	其他
		hops = c <l？l  -  c：l + opts.slideCount  -  c;
	返回啤酒花;
};

//通過設置一個明確的bg顏色來修正ie6中的clearType問題
//（否則文本幻燈片在淡入淡出過程中看起來很可怕）
函數clearTypeFix（$幻燈片）{
	調試（'應用clearType背景顏色黑客'）;
	函數十六進制（s）{
		s = parseInt（s，10）.toString（16）;
		返回s.length <2？'0'+ s：s;
	}
	函數getBg（e）{
		for（; e && e.nodeName.toLowerCase（）！='html'; e = e.parentNode）{
			var v = $ .css（e，'background-color'）;
			if（v && v.indexOf（'rgb'）> = 0）{
				var rgb = v.match（/ \ d + / g）;
				返回'＃'+十六進制（rgb [0]）+十六進制（rgb [1]）+十六進制（rgb [2]）;
			}
			如果（v && v！='透明'）
				返回v;
		}
		返回'#ffffff';
	}
	$ slides.each（function（）{$（this）.css（'background-color'，getBg（this））;}）;
}

//在下一次轉換之前重置共同的道具
$ .fn.cycle.commonReset = function（curr，next，opts，w，h，rev）{
	$（opts.elements）。不是（CURR）.hide（）;
	if（typeof opts.cssBefore.opacity =='undefined'）
		opts.cssBefore.opacity = 1;
	opts.cssBefore.display ='block';
	if（opts.slideResize && w！== false && next.cycleW> 0）
		opts.cssBefore.width = next.cycleW;
	if（opts.slideResize && h！== false && next.cycleH> 0）
		opts.cssBefore.height = next.cycleH;
	opts.cssAfter = opts.cssAfter || {};
	opts.cssAfter.display ='none';
	$（curr）.css（'zIndex'，opts.slideCount +（rev === true？1：0））;
	$（next）.css（'zIndex'，opts.slideCount +（rev === true？0：1））;
};

//實現轉換的實際fn
$ .fn.cycle.custom = function（curr，next，opts，cb，fwd，speedOverride）{
	var $ l = $（curr），$ n = $（next）;
	var speedIn = opts.speedIn，speedOut = opts.speedOut，easeIn = opts.easeIn，easeOut = opts.easeOut，animInDelay = opts.animInDelay，animOutDelay = opts.animOutDelay;
	$ n.css（opts.cssBefore）;
	if（speedOverride）{
		如果（typeof speedOverride =='number'）
			speedIn = speedOut = speedOverride;
		其他
			speedIn = speedOut = 1;
		easeIn = easeOut = null;
	}
	var fn = function（）{
		$ n.delay（animInDelay）.animate（opts.animIn，speedIn，easeIn，function（）{
			CB（）;
		}）;
	};
	$ l.delay（animOutDelay）.animate（opts.animOut，speedOut，easeOut，function（）{
		$ l.css（opts.cssAfter）;
		如果（！opts.sync） 
			FN（）;
	}）;
	if（opts.sync）fn（）;
};

//轉換定義 - 此處僅定義淡入淡出，轉換包定義其餘部分
$ .fn.cycle.transitions = {
	淡入淡出：函數（$ cont，$幻燈片，opts）{
		$ slides.not（'：當量（'+ opts.currSlide +'）'）。CSS（'不透明度“，0）;
		opts.before.push（函數（curr，next，opts）{
			$ .fn.cycle.commonReset（CURR，下一步，選擇採用）;
			opts.cssBefore.opacity = 0;
		}）;
		opts.animIn = {opacity：1};
		opts.animOut = {opacity：0};
		opts.cssBefore = {top：0，left：0};
	}
};

$ .fn.cycle.ver = function（）{return ver; };

/ /如果你喜歡全局覆蓋這些（他們都是可選的）
$ .fn.cycle.defaults = {
    activePagerClass：'activeSlide'，//用於活動尋呼機鏈接的類名
    after：null，//過渡回調（範圍設置為顯示的元素）：function（currSlideElement，nextSlideElement，options，forwardFlag）
    allowPagerClickBubble：false，//允許或阻止頁面定位器上的點擊事件冒泡
    animIn：null，//定義幻燈片動畫效果的屬性
    animInDelay：0，//允許在下一張幻燈片轉換之前延遲	
    animOut：null，//定義幻燈片動畫效果的屬性
    animOutDelay：0，//允許當前幻燈片轉換之前的延遲
    方面：錯誤，/ /適合調整大小，保持寬高比，如果需要裁剪（必須使用適合的選項）
    autostop：0，// true在X轉換後結束幻燈片（其中X ==幻燈片計數）
    autostopCount：0，//轉換次數（可選用autostop定義X）
    向後：false，// true，在最後一張幻燈片中開始幻燈片並向後移動通過堆棧
    before：null，//過渡回調（範圍設置為要顯示的元素）：function（currSlideElement，nextSlideElement，options，forwardFlag）
    中心：空，/ /設置為真有循環每個幻燈片添加頂部/左邊距（使用寬度和高度選項）
    cleartype：！$。support.opacity，//如果應該應用clearType更正，則為true（對於IE）
    cleartypeNoBg：false，//設置為true以禁用額外的cleartype修復（在幻燈片上保留false以強制背景顏色設置）
    containerResize：1，//調整容器的大小以適合最大的幻燈片
    containerResizeHeight：0，//調整容器高度以適合最大的幻燈片，但保持寬度動態
    continuous：0，// true在當前完成後立即開始下一個轉換
    cssAfter：null，//定義轉換出來後幻燈片狀態的屬性
    cssBefore：null，//在轉換之前定義幻燈片初始狀態的屬性
    延遲：0，//第一次轉換的附加延遲（以ms為單位）（提示：可以是負數）
    easeIn：null，//緩動“in”轉換
    easeOut：null，//緩解“out”轉換
    easing：null，//緩解輸入和輸出轉換的方法
    end：null，//當幻燈片播放結束時調用回調（與autostop或nowrap選項一起使用）：function（options）
    fastOnEvent：0，//手動觸發時（通過尋呼機或prev / next）強制快速轉換; 值以毫秒為單位的時間
    fit：0，//強制滑動以適合容器
    fx：'fade'，//過渡效果的名字（或逗號分隔的名字，例如：'fade，scrollUp，shuffle'）
    fxFn：null，//用於控制轉換的函數：function（currSlideElement，nextSlideElement，options，afterCalback，forwardFlag）
    height：'auto'，//容器高度（如果'fit'選項為true，幻燈片也會被設置為這個高度）
    manualTrump：true，//使手動轉換停止活動轉換，而不是被忽略
    metaAttr：“循環”，//數據屬性，保存幻燈片的選項數據
    next：null，//元素，jQuery對像或jQuery選擇器字符串，用於元素用作下一張幻燈片的事件觸發器
    nowrap：0，// true防止幻燈片包裝
    onPagerEvent：null，//呼機事件的callback fn：function（zeroBasedSlideIndex，slideElement）
    onPrevNextEvent：null，//前一個/後一個事件的回調函數：function（isNext，zeroBasedSlideIndex，slideElement）
    pager：null，//元素，jQuery對像或jQuery選擇器字符串，用於元素用作尋呼機容器
    pagerAnchorBuilder：null，//建立錨鏈接的回調函數：function（index，DOMelement）
    pagerEvent：'click.cycle'，//驅動尋呼機導航的事件名稱
    暫停：0，/ /真正啟用“懸停暫停”
    pauseOnPagerHover：0，//當懸停在分頁器鏈接上時，為true以暫停
    prev：null，//元素，jQuery對像或元素的jQuery選擇器字符串用作上一張幻燈片的事件觸發器
    prevNextEvent：'click.cycle'，//將手動轉換為上一張或下一張幻燈片的事件
    隨機：0，//對於隨機為true，對於序列為false（不適用於shuffle fx）
    randomizeEffects：1，//使用多個效果時有效; 真正使效果序列隨機
    requeueOnImageNotLoaded：true，//如果任何圖像幻燈片尚未加載，請重新播放幻燈片
    requeueTimeout：250，// ms延遲重發
    rev：0，//使動畫反轉（對於支持它的效果，例如scrollHorz / scrollVert / shuffle）
    shuffle：null，//用於隨機播放的動畫，例如：{top：15，left：200}
    skipInitializationCallbacks：false，//設置為true以禁用在任何轉換之前發生的第一個前/後回調
    slideExpr：null，//用於選擇幻燈片的表達式（如果需要除所有子項外的其他內容）
    slideResize：1，//在每次轉換之前強制將寬度/高度滑動到固定大小
    速度：1000，//轉換速度（任何有效的fx速度值）
    speedIn：null，//“in”轉換的速度
    speedOut：null，//“out”轉換的速度
    startingSlide：undefined，//要顯示的第一張幻燈片的從零開始的索引
    同步：1，//如果同時出現轉換，則為true
    超時：4000，//幻燈片轉換之間的毫秒（0禁用自動提前）
    timeoutFn：null，//確定每個幻燈片超時值的回調函數（currSlideElement，nextSlideElement，options，forwardFlag）
    updateActivePagerLink：null，//調用回調函數fn來更新活動的尋呼機鏈接（增加/刪除activePagerClass風格）
    width：null //容器寬度（如果“fit”選項為true，則幻燈片也將設置為此寬度）
};

}）（jQuery的）;


/ *！
 * jQuery循環插件轉換定義
 *這個腳本是jQuery Cycle Plugin的一個插件
 *示例和文檔：http://malsup.com/jquery/cycle/
 * Copyright（c）2007-2010 M. Alsup
 *版本：2.73
 *根據MIT和GPL許可證獲得雙重許可：
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * /
（function（$）{
“嚴格使用”;

//
//這些函數定義指定的幻燈片初始化和屬性
//轉換 要保存文件大小，隨時刪除任何這些你
//不需要
//
$ .fn.cycle.transitions.none = function（$ cont，$ slides，opts）{
	opts.fxFn = function（curr，next，opts，after）{
		$（下）.show（）;
		$（CURR）.hide（）;
		後（）;
	};
};

//不是淡入淡出，淡出只能淡出頂部幻燈片
$ .fn.cycle.transitions.fadeout = function（$ cont，$ slides，opts）{
	$ slides.not（'：eq（'+ opts.currSlide +'）'）。css（{display：'block'，'opacity'：1}）;
	opts.before.push（函數（curr，next，opts，w，h，rev）{
		$（curr）.css（'zIndex'，opts.slideCount +（rev！== true？1：0））;
		$（next）.css（'zIndex'，opts.slideCount +（rev！== true？0：1））;
	}）;
	opts.animIn.opacity = 1;
	opts.animOut.opacity = 0;
	opts.cssBefore.opacity = 1;
	opts.cssBefore.display ='block';
	opts.cssAfter.zIndex = 0;
};

//向上/向下/向左/向右滾動
$ .fn.cycle.transitions.scrollUp = function（$ cont，$ slides，opts）{
	$ cont.css（'溢出'，'隱藏'）;
	opts.before.push（$ fn.cycle.commonReset。）;
	var h = $ cont.height（）;
	opts.cssBefore.top = h;
	opts.cssBefore.left = 0;
	opts.cssFirst.top = 0;
	opts.animIn.top = 0;
	opts.animOut.top = -h;
};
$ .fn.cycle.transitions.scrollDown = function（$ cont，$ slides，opts）{
	$ cont.css（'溢出'，'隱藏'）;
	opts.before.push（$ fn.cycle.commonReset。）;
	var h = $ cont.height（）;
	opts.cssFirst.top = 0;
	opts.cssBefore.top = -h;
	opts.cssBefore.left = 0;
	opts.animIn.top = 0;
	opts.animOut.top = h;
};
$ .fn.cycle.transitions.scrollLeft = function（$ cont，$ slides，opts）{
	$ cont.css（'溢出'，'隱藏'）;
	opts.before.push（$ fn.cycle.commonReset。）;
	var w = $ cont.width（）;
	opts.cssFirst.left = 0;
	opts.cssBefore.left = w;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.left = 0-w;
};
$ .fn.cycle.transitions.scrollRight = function（$ cont，$ slides，opts）{
	$ cont.css（'溢出'，'隱藏'）;
	opts.before.push（$ fn.cycle.commonReset。）;
	var w = $ cont.width（）;
	opts.cssFirst.left = 0;
	opts.cssBefore.left = -w;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.left = w;
};
$ .fn.cycle.transitions.scrollHorz = function（$ cont，$ slides，opts）{
	$ cont.css（'溢出'，“隱藏”）寬度（）;
	opts.before.push（函數（curr，next，opts，fwd）{
		如果（opts.rev）
			fwd =！fwd;
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用）;
		opts.cssBefore.left = fwd？（next.cycleW-1）：（1-next.cycleW）;
		opts.animOut.left = fwd？-curr.cycleW：curr.cycleW;
	}）;
	opts.cssFirst.left = 0;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.top = 0;
};
$ .fn.cycle.transitions.scrollVert = function（$ cont，$ slides，opts）{
	$ cont.css（'溢出'，'隱藏'）;
	opts.before.push（函數（curr，next，opts，fwd）{
		如果（opts.rev）
			fwd =！fwd;
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用）;
		opts.cssBefore.top = fwd？（1-next.cycleH）:( next.cycleH-1）;
		opts.animOut.top = fwd？curr.cycleH：-curr.cycleH;
	}）;
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.animIn.top = 0;
	opts.animOut.left = 0;
};

// slideX / slideY
$ .fn.cycle.transitions.slideX = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$（opts.elements）。不是（CURR）.hide（）;
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，假的，真正的）;
		opts.animIn.width = next.cycleW;
	}）;
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
	opts.animIn.width ='show';
	opts.animOut.width = 0;
};
$ .fn.cycle.transitions.slideY = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$（opts.elements）。不是（CURR）.hide（）;
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，真，假）;
		opts.animIn.height = next.cycleH;
	}）;
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.height = 0;
	opts.animIn.height ='show';
	opts.animOut.height = 0;
};

//洗牌
$ .fn.cycle.transitions.shuffle = function（$ cont，$ slides，opts）{
	var i，w = $ cont.css（'overflow'，'visible'）。width（）;
	$ slides.css（{left：0，top：0}）;
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，真正的，真實的，真正的）;
	}）;
	//只調整一次速度！
	如果（！opts.speedAdjusted）{
		opts.speed = opts.speed / 2; // shuffle有2個轉換
		opts.speedAdjusted = true;
	}
	opts.random = 0;
	opts.shuffle = opts.shuffle || {left：-w，top：15};
	opts.els = [];
	for（i = 0; i <$ slides.length; i ++）
		opts.els.push（$幻燈片[I]）;

	for（i = 0; i <opts.currSlide; i ++）
		opts.els.push（opts.els.shift（））;

	//自定義轉換fn（本傑明·斯特林為了這甜頭！）
	opts.fxFn = function（curr，next，opts，cb，fwd）{
		如果（opts.rev）
			fwd =！fwd;
		var $ el = fwd？$（curr）：$（next）;
		$（下）的.css（opts.cssBefore）;
		var count = opts.slideCount;
		$ el.animate（opts.shuffle，opts.speedIn，opts.easeIn，function（）{
			var hops = $ .fn.cycle.hopsFromLast（opts，fwd）;
			for（var k = 0; k <hops; k ++）{
				如果（fwd）
					opts.els.push（opts.els.shift（））;
				其他
					opts.els.unshift（opts.els.pop（））;
			}
			if（fwd）{
				for（var i = 0，len = opts.els.length; i <len; i ++）
					$（opts.els [i]）。css（'z-index'，len-i + count）;
			}
			else {
				var z = $（curr）.css（'z-index'）;
				$ el.css（'z-index'，parseInt（z，10）+ 1 + count）;
			}
			$ el.animate（{left：0，top：0}，opts.speedOut，opts.easeOut，function（）{
				$（fwd？this：curr）.hide（）;
				if（cb）cb（）;
			}）;
		}）;
	};
	$ .extend（opts.cssBefore，{display：'block'，opacity：1，top：0，left：0}）;
};

//向上/向下/向左/向右
$ .fn.cycle.transitions.turnUp = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，真，假）;
		opts.cssBefore.top = next.cycleH;
		opts.animIn.height = next.cycleH;
		opts.animOut.width = next.cycleW;
	}）;
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.cssBefore.height = 0;
	opts.animIn.top = 0;
	opts.animOut.height = 0;
};
$ .fn.cycle.transitions.turnDown = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，真，假）;
		opts.animIn.height = next.cycleH;
		opts.animOut.top = curr.cycleH;
	}）;
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.height = 0;
	opts.animOut.height = 0;
};
$ .fn.cycle.transitions.turnLeft = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，假的，真正的）;
		opts.cssBefore.left = next.cycleW;
		opts.animIn.width = next.cycleW;
	}）;
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
	opts.animIn.left = 0;
	opts.animOut.width = 0;
};
$ .fn.cycle.transitions.turnRight = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，假的，真正的）;
		opts.animIn.width = next.cycleW;
		opts.animOut.left = curr.cycleW;
	}）;
	$ .extend（opts.cssBefore，{top：0，left：0，width：0}）;
	opts.animIn.left = 0;
	opts.animOut.width = 0;
};

//放大
$ .fn.cycle.transitions.zoom = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，假的，假的，真正的）;
		opts.cssBefore.top = next.cycleH / 2;
		opts.cssBefore.left = next.cycleW / 2;
		$ .extend（opts.animIn，{top：0，left：0，width：next.cycleW，height：next.cycleH}）;
		$ .extend（opts.animOut，{width：0，height：0，top：curr.cycleH / 2，left：curr.cycleW / 2}）;
	}）;
	opts.cssFirst.top = 0;
	opts.cssFirst.left = 0;
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
};

// fadeZoom
$ .fn.cycle.transitions.fadeZoom = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，假的，假的）;
		opts.cssBefore.left = next.cycleW / 2;
		opts.cssBefore.top = next.cycleH / 2;
		$ .extend（opts.animIn，{top：0，left：0，width：next.cycleW，height：next.cycleH}）;
	}）;
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
	opts.animOut.opacity = 0;
};

// blindX
$ .fn.cycle.transitions.blindX = function（$ cont，$ slides，opts）{
	var w = $ cont.css（'overflow'，'hidden'）。width（）;
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用）;
		opts.animIn.width = next.cycleW;
		opts.animOut.left = curr.cycleW;
	}）;
	opts.cssBefore.left = w;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.left = w;
};
//盲人
$ .fn.cycle.transitions.blindY = function（$ cont，$ slides，opts）{
	var h = $ cont.css（'overflow'，'hidden'）。height（）;
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用）;
		opts.animIn.height = next.cycleH;
		opts.animOut.top = curr.cycleH;
	}）;
	opts.cssBefore.top = h;
	opts.cssBefore.left = 0;
	opts.animIn.top = 0;
	opts.animOut.top = h;
};
// blindZ
$ .fn.cycle.transitions.blindZ = function（$ cont，$ slides，opts）{
	var h = $ cont.css（'overflow'，'hidden'）。height（）;
	var w = $ cont.width（）;
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用）;
		opts.animIn.height = next.cycleH;
		opts.animOut.top = curr.cycleH;
	}）;
	opts.cssBefore.top = h;
	opts.cssBefore.left = w;
	opts.animIn.top = 0;
	opts.animIn.left = 0;
	opts.animOut.top = h;
	opts.animOut.left = w;
};

// growX  - 從居中的0寬度水平增長
$ .fn.cycle.transitions.growX = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，假的，真正的）;
		opts.cssBefore.left = this.cycleW / 2;
		opts.animIn.left = 0;
		opts.animIn.width = this.cycleW;
		opts.animOut.left = 0;
	}）;
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
};
// growY  - 從中心0的高度垂直增長
$ .fn.cycle.transitions.growY = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，真，假）;
		opts.cssBefore.top = this.cycleH / 2;
		opts.animIn.top = 0;
		opts.animIn.height = this.cycleH;
		opts.animOut.top = 0;
	}）;
	opts.cssBefore.height = 0;
	opts.cssBefore.left = 0;
};

// curtainX  - 水平擠壓兩邊
$ .fn.cycle.transitions.curtainX = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，假的，真實的，真正的）;
		opts.cssBefore.left = next.cycleW / 2;
		opts.animIn.left = 0;
		opts.animIn.width = this.cycleW;
		opts.animOut.left = curr.cycleW / 2;
		opts.animOut.width = 0;
	}）;
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
};
// curtainY  - 垂直擠壓兩邊
$ .fn.cycle.transitions.curtainY = function（$ cont，$ slides，opts）{
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，真，假，真）;
		opts.cssBefore.top = next.cycleH / 2;
		opts.animIn.top = 0;
		opts.animIn.height = next.cycleH;
		opts.animOut.top = curr.cycleH / 2;
		opts.animOut.height = 0;
	}）;
	opts.cssBefore.height = 0;
	opts.cssBefore.left = 0;
};

//覆蓋 - 下一張幻燈片覆蓋的curr幻燈片
$ .fn.cycle.transitions.cover = function（$ cont，$ slides，opts）{
	var d = opts.direction || '剩下';
	var w = $ cont.css（'overflow'，'hidden'）。width（）;
	var h = $ cont.height（）;
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用）;
		opts.cssAfter.display ='';
		如果（d =='右'）
			opts.cssBefore.left = -w;
		else if（d =='up'）
			opts.cssBefore.top = h;
		否則，如果（D =='下'）
			opts.cssBefore.top = -h;
		其他
			opts.cssBefore.left = w;
	}）;
	opts.animIn.left = 0;
	opts.animIn.top = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.left = 0;
};

//揭開 -  curr幻燈片移動下一張幻燈片
$ .fn.cycle.transitions.uncover = function（$ cont，$ slides，opts）{
	var d = opts.direction || '剩下';
	var w = $ cont.css（'overflow'，'hidden'）。width（）;
	var h = $ cont.height（）;
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，真正的，真實的，真正的）;
		如果（d =='右'）
			opts.animOut.left = w;
		else if（d =='up'）
			opts.animOut.top = -h;
		否則，如果（D =='下'）
			opts.animOut.top = h;
		其他
			opts.animOut.left = -w;
	}）;
	opts.animIn.left = 0;
	opts.animIn.top = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.left = 0;
};

//折騰 - 移動上面的幻燈片並消失
$ .fn.cycle.transitions.toss = function（$ cont，$ slides，opts）{
	var w = $ cont.css（'overflow'，'visible'）。width（）;
	var h = $ cont.height（）;
	opts.before.push（函數（curr，next，opts）{
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，真正的，真實的，真正的）;
		//提供默認折騰設置，如果animOut沒有提供
		如果（！opts.animOut.left &&！opts.animOut.top）
			$ .extend（opts.animOut，{left：w * 2，top：-h / 2，opacity：0}）;
		其他
			opts.animOut.opacity = 0;
	}）;
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
};

//擦拭 - 剪輯動畫
$ .fn.cycle.transitions.wipe = function（$ cont，$ slides，opts）{
	var w = $ cont.css（'overflow'，'hidden'）。width（）;
	var h = $ cont.height（）;
	opts.cssBefore = opts.cssBefore || {};
	var clip;
	如果（opts.clip）{
		if（/l2r/.test(opts.clip））
			clip ='rect（0px 0px'+ h +'px 0px）';
		else if（/r2l/.test(opts.clip））
			clip ='rect（0px'+ w +'px'+ h +'px'+ w +'px）';
		else if（/t2b/.test(opts.clip））
			clip ='rect（0px'+ w +'px 0px 0px）';
		else if（/b2t/.test(opts.clip））
			clip ='rect（'+ h +'px'+ w +'px'+ h +'px 0px）';
		else if（/zoom/.test(opts.clip））{
			var top = parseInt（h / 2,10）;
			var left = parseInt（w / 2,10）;
			clip ='rect（'+ top +'px'+ left +'px'+ top +'px'+ left +'px）';
		}
	}

	opts.cssBefore.clip = opts.cssBefore.clip || clip || 'rect（0px 0px 0px 0px）';

	var d = opts.cssBefore.clip.match（/（\ d +）/ g）;
	r = parseInt（d [1]，10），b = parseInt（d [2]，10），l = parseInt（d [3]，10）; var t =

	opts.before.push（函數（curr，next，opts）{
		if（curr == next）return;
		var $ curr = $（curr），$ next = $（next）;
		$ .fn.cycle.commonReset（CURR，下一步，選擇採用，真，真，假）;
		opts.cssAfter.display ='block';

		var step = 1，count = parseInt（（opts.speedIn / 13），10） -  1;
		（函數f（）{
			var tt = t？t  -  parseInt（step *（t / count），10）：0;
			var ll = l？l  -  parseInt（step *（l / count），10）：0;
			var bb = b <h？b + parseInt（step *（（hb）/ count || 1），10）：h;
			var rr = r <w？r + parseInt（step *（（wr）/ count || 1），10）：w;
			$ next.css（{clip：'rect（'+ tt +'px'+ rr +'px'+ bb +'px'+ ll +'px）'}）;
			（步驟++ <=計數）？setTimeout（f，13）：$ curr.css（'display'，'none'）;
		}）（）;
	}）;
	$ .extend（opts.cssBefore，{display：'block'，opacity：1，top：0，left：0}）;
	opts.animIn = {left：0};
	opts.animOut = {left：0};
};

}）（jQuery的）;