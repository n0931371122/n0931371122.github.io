<!doctype html>
<html lang="zh">
	<head>
		<?php include "header-title.php"; ?>		
	</head>
	<body>
		<div class="wp page2" id="home">
      <?php include "header.php"; ?>
			<!-- main ======================================================================================= -->
			<main class="main">
				<?php include "title.php"; ?>
				<div class="switch_group mt-3 ml-1 row">
					<div class="col-6 col-md-auto   pr-0 pr-sm-3 row">
						<label class="switch col-auto  mt-2">
							<input id="inquire_or_add_switch" type="checkbox" checked>
							<span class="slider"></span>
						</label>
						<p class="col-auto pr-0 pr-sm-3" style="line-height:1.4em" >查詢或新增</p>
					</div>

					<div class="col-6 col-md-auto ml-3  ml-md-0  pr-0 pr-sm-3  row">
						<label  class="switch  col-auto  mt-2">
							<input id="inquire_result1_switch" type="checkbox" checked>
							<span class="slider round"></span>
						</label>
						<p class="col-auto pr-0 pr-sm-3" style="line-height:1.4em">查詢結果1</p>	
					</div>

					<div class="col-6 col-md-auto ml-0 ml-sm-0  pr-0 pr-sm-3 pl-0 row">
						<label  class="switch col-auto   mt-2 ">
							<input id="maintain_switch" type="checkbox" checked>
							<span class="slider round"></span>
						</label>
						<p class="col-auto pr-0 pr-sm-3" style="line-height:1.4em">常用部品維護</p>
					</div>

					<div class="col-6 col-md-auto ml-0 ml-sm-0  pr-0 pr-sm-3 pl-3 row">
						<label  class="switch col-auto  mt-2 ">
							<input id="inquire_result2_switch" type="checkbox" checked>
							<span class="slider round"></span>
						</label>
						<p class="col-auto pr-0 pr-sm-3" style="line-height:1.4em">查詢結果2</p>
					</div>


				</div>
				<div style="clear:both;"></div>



				<div class="left_block float-lg-left  pr-lg-2">
					<div class="px-sm-4 px-2 block_style">
								<div class="inquire_or_add_head">
									<p class="float-left py-2 mt-2 px-3 ">查詢或新增</p>
									<a href="javascript:toggle_inquire_or_add()" class="float-right pt-3" >
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
										<title></title>
										<g id="icomoon-ignore">
										</g>
										<path d="M 607.5 205.5 l -178.5 178.5 l 178.5 178.5 l -45 45 l -178.5 -178.5 l -178.5 178.5 l -45 -45 l 178.5 -178.5 l -178.5 -178.5 l 45 -45 l 178.5 178.5 l 178.5 -178.5 Z" />
										</svg>
									</a>
								</div>
								<form  class="inquire_or_add mt-3 mt-md-4 pt-0 pt-md-2  " action="" method="GET">
									<div class="row w-100 ml-0">
										<p class="col-12 col-sm-3 col-md-auto col-lg-4 col-xl-auto mt-0 mb-2 mb-sm-0 my-md-0 my-xl-1 pl-sm-3">群組名稱</p>
										<input name="group_name"  class="col-11 col-md col-sm-9  col-lg-8  col-xl-3 mr-0 ml-3 ml-sm-0 group_name" type="text">
									
										<p class="offset-xl-1 col-11 col-sm-3 col-md-auto col-lg-4 col-xl-auto mt-3 mt-sm-4 mt-md-0 mt-lg-4 mb-2 mb-sm-0 mb-xl-1  my-xl-1 pl-3  sort_order">排序</p>
									 <input  name="group_sort" class="col-11 col-sm-9 col-md   col-lg-8 col-xl-3 mt-sm-4 mt-md-0 mt-lg-4 mt-xl-0 ml-3 ml-sm-0 "  type="text">
									</div>
									<div class="mt-2 mt-md-4 mt-xl-0 ml-3  ml-md-0  pt-2 pt-xl-0">
										<button class="button_mt px-4 py-2 mt-4">
											<p class=" mb-0 float-left">新增</p>
											<svg class="float-left" fill="white" style="margin-top:1px; margin-left:1px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
											<title></title>
											<g id="icomoon-ignore">
											</g>
											<path d="M 608 352 h -192 v -192 c 0 -17.6 -14.4 -32 -32 -32 s -32 14.4 -32 32 v 192 h -192 c -17.6 0 -32 14.4 -32 32 s 14.4 32 32 32 h 192 v 192 c 0 17.6 14.4 32 32 32 s 32 -14.4 32 -32 v -192 h 192 c 17.6 0 32 -14.4 32 -32 s -14.4 -32 -32 -32 Z" />
											</svg>
										</button>
									</div>
								</form>
					</div>
					<div  class="px-sm-4 px-2 block_style">
								<div class="inquire_result1_head">
									<p class="float-left py-2 mt-2 px-3 mb-0">查詢或新增結果</p>
									<a href="javascript:toggle_inquire_result1()" class="float-right pt-3" id="inquire_result1_table_toggle_close">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
										<title></title>
										<g id="icomoon-ignore">
										</g>
										<path d="M 607.5 205.5 l -178.5 178.5 l 178.5 178.5 l -45 45 l -178.5 -178.5 l -178.5 178.5 l -45 -45 l 178.5 -178.5 l -178.5 -178.5 l 45 -45 l 178.5 178.5 l 178.5 -178.5 Z" />
										</svg>
									</a>
								</div>
								<div class="table_wrapper mt-4 mCustomScrollbar content mb_20px" data-mcs-theme="dark">
									<table border="0" class="mb-4">
											<thead>
												<tr>
													<th ><p class="float-left mb-0 ml-3 pb-0">群組名稱</p></th>
													<th >序號</th>
													<th class="text-center unsort" >更新</th>
													<th  class="text-center unsort">移除</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<input type="text" value="煞車塊">
													</td>
													<td>
														<input type="text" >
													</td>
													<td>
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>
													<td class="text-center">
														<a href="">
															<svg class="mt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 336 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z M 176 448 c 8.832 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.168 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.168 16 16 16 Z M 464 96 h -64 v -32 c 0 -35.344 -28.656 -64 -64 -64 h -160 c -35.344 0 -64 28.656 -64 64 v 32 h -64 l -48 48 c 0 8.848 7.168 16 16 16 h 48 v 320 c 0 17.664 14.336 32 32 32 h 320 c 17.664 0 32 -14.336 32 -32 v -320 h 48 c 8.848 0 16 -7.152 16 -16 l -48 -48 Z M 160 64 c 0 -17.664 14.336 -32 32 -32 h 128 c 17.664 0 32 14.336 32 32 v 32 h -192 v -32 Z M 416 464 c 0 8.848 -7.152 16 -16 16 h -288 c -8.832 0 -16 -7.152 -16 -16 v -304 h 320 v 304 Z M 256 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z" />
															</svg>    
														</a>
													</td>
												</tr>

												<tr>
													<td>
														<input type="text" value="火星塞">
													</td>
													<td>
														<input type="text">
													</td>
													<td>
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>
													<td class="text-center">
														<a href="">
															<svg class="mt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 336 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z M 176 448 c 8.832 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.168 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.168 16 16 16 Z M 464 96 h -64 v -32 c 0 -35.344 -28.656 -64 -64 -64 h -160 c -35.344 0 -64 28.656 -64 64 v 32 h -64 l -48 48 c 0 8.848 7.168 16 16 16 h 48 v 320 c 0 17.664 14.336 32 32 32 h 320 c 17.664 0 32 -14.336 32 -32 v -320 h 48 c 8.848 0 16 -7.152 16 -16 l -48 -48 Z M 160 64 c 0 -17.664 14.336 -32 32 -32 h 128 c 17.664 0 32 14.336 32 32 v 32 h -192 v -32 Z M 416 464 c 0 8.848 -7.152 16 -16 16 h -288 c -8.832 0 -16 -7.152 -16 -16 v -304 h 320 v 304 Z M 256 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z" />
															</svg>    
														</a>
													</td>
												</tr>

												<tr>
													<td>
														<input type="text" value="後視鏡">
													</td>
													<td>
														<input type="text">
													</td>
													<td>
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>
													<td class="text-center">
														<a href="">
															<svg class="mt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 336 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z M 176 448 c 8.832 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.168 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.168 16 16 16 Z M 464 96 h -64 v -32 c 0 -35.344 -28.656 -64 -64 -64 h -160 c -35.344 0 -64 28.656 -64 64 v 32 h -64 l -48 48 c 0 8.848 7.168 16 16 16 h 48 v 320 c 0 17.664 14.336 32 32 32 h 320 c 17.664 0 32 -14.336 32 -32 v -320 h 48 c 8.848 0 16 -7.152 16 -16 l -48 -48 Z M 160 64 c 0 -17.664 14.336 -32 32 -32 h 128 c 17.664 0 32 14.336 32 32 v 32 h -192 v -32 Z M 416 464 c 0 8.848 -7.152 16 -16 16 h -288 c -8.832 0 -16 -7.152 -16 -16 v -304 h 320 v 304 Z M 256 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z" />
															</svg>    
														</a>
													</td>
												</tr>

												<tr>
													<td>
														<input type="text" value="後緩衝器">
													</td>
													<td>
														<input type="text">
													</td>
													<td>
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>
													<td class="text-center">
														<a href="">
															<svg class="mt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 336 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z M 176 448 c 8.832 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.168 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.168 16 16 16 Z M 464 96 h -64 v -32 c 0 -35.344 -28.656 -64 -64 -64 h -160 c -35.344 0 -64 28.656 -64 64 v 32 h -64 l -48 48 c 0 8.848 7.168 16 16 16 h 48 v 320 c 0 17.664 14.336 32 32 32 h 320 c 17.664 0 32 -14.336 32 -32 v -320 h 48 c 8.848 0 16 -7.152 16 -16 l -48 -48 Z M 160 64 c 0 -17.664 14.336 -32 32 -32 h 128 c 17.664 0 32 14.336 32 32 v 32 h -192 v -32 Z M 416 464 c 0 8.848 -7.152 16 -16 16 h -288 c -8.832 0 -16 -7.152 -16 -16 v -304 h 320 v 304 Z M 256 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z" />
															</svg>    
														</a>
													</td>
												</tr>


												<tr>
													<td>
														<input type="text" value="大鎖">
													</td>
													<td>
														<input type="text">
													</td>
													<td>
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>
													<td class="text-center">
														<a href="">
															<svg class="mt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 336 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z M 176 448 c 8.832 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.168 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.168 16 16 16 Z M 464 96 h -64 v -32 c 0 -35.344 -28.656 -64 -64 -64 h -160 c -35.344 0 -64 28.656 -64 64 v 32 h -64 l -48 48 c 0 8.848 7.168 16 16 16 h 48 v 320 c 0 17.664 14.336 32 32 32 h 320 c 17.664 0 32 -14.336 32 -32 v -320 h 48 c 8.848 0 16 -7.152 16 -16 l -48 -48 Z M 160 64 c 0 -17.664 14.336 -32 32 -32 h 128 c 17.664 0 32 14.336 32 32 v 32 h -192 v -32 Z M 416 464 c 0 8.848 -7.152 16 -16 16 h -288 c -8.832 0 -16 -7.152 -16 -16 v -304 h 320 v 304 Z M 256 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z" />
															</svg>    
														</a>
													</td>
												</tr>

												<tr>
													<td>
														<input type="text" value="安全帽">
													</td>
													<td>
														<input type="text">
													</td>
													<td>
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>
													<td class="text-center">
														<a href="">
															<svg class="mt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 336 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z M 176 448 c 8.832 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.168 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.168 16 16 16 Z M 464 96 h -64 v -32 c 0 -35.344 -28.656 -64 -64 -64 h -160 c -35.344 0 -64 28.656 -64 64 v 32 h -64 l -48 48 c 0 8.848 7.168 16 16 16 h 48 v 320 c 0 17.664 14.336 32 32 32 h 320 c 17.664 0 32 -14.336 32 -32 v -320 h 48 c 8.848 0 16 -7.152 16 -16 l -48 -48 Z M 160 64 c 0 -17.664 14.336 -32 32 -32 h 128 c 17.664 0 32 14.336 32 32 v 32 h -192 v -32 Z M 416 464 c 0 8.848 -7.152 16 -16 16 h -288 c -8.832 0 -16 -7.152 -16 -16 v -304 h 320 v 304 Z M 256 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z" />
															</svg>    
														</a>
													</td>
												</tr>

												<tr>
													<td>
														<input type="text" value="排氣管">
													</td>
													<td>
														<input type="text">
													</td>
													<td>
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>
													<td class="text-center">
														<a href="">
															<svg class="mt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 336 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z M 176 448 c 8.832 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.168 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.168 16 16 16 Z M 464 96 h -64 v -32 c 0 -35.344 -28.656 -64 -64 -64 h -160 c -35.344 0 -64 28.656 -64 64 v 32 h -64 l -48 48 c 0 8.848 7.168 16 16 16 h 48 v 320 c 0 17.664 14.336 32 32 32 h 320 c 17.664 0 32 -14.336 32 -32 v -320 h 48 c 8.848 0 16 -7.152 16 -16 l -48 -48 Z M 160 64 c 0 -17.664 14.336 -32 32 -32 h 128 c 17.664 0 32 14.336 32 32 v 32 h -192 v -32 Z M 416 464 c 0 8.848 -7.152 16 -16 16 h -288 c -8.832 0 -16 -7.152 -16 -16 v -304 h 320 v 304 Z M 256 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z" />
															</svg>    
														</a>
													</td>
												</tr>	
	
												<tr>
													<td>
														<input type="text" value="排氣管">
													</td>
													<td>
														<input type="text">
													</td>
													<td>
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>
													<td class="text-center">
														<a href="">
															<svg class="mt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 336 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z M 176 448 c 8.832 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.168 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.168 16 16 16 Z M 464 96 h -64 v -32 c 0 -35.344 -28.656 -64 -64 -64 h -160 c -35.344 0 -64 28.656 -64 64 v 32 h -64 l -48 48 c 0 8.848 7.168 16 16 16 h 48 v 320 c 0 17.664 14.336 32 32 32 h 320 c 17.664 0 32 -14.336 32 -32 v -320 h 48 c 8.848 0 16 -7.152 16 -16 l -48 -48 Z M 160 64 c 0 -17.664 14.336 -32 32 -32 h 128 c 17.664 0 32 14.336 32 32 v 32 h -192 v -32 Z M 416 464 c 0 8.848 -7.152 16 -16 16 h -288 c -8.832 0 -16 -7.152 -16 -16 v -304 h 320 v 304 Z M 256 448 c 8.848 0 16 -7.152 16 -16 v -224 c 0 -8.848 -7.152 -16 -16 -16 s -16 7.152 -16 16 v 224 c 0 8.848 7.152 16 16 16 Z" />
															</svg>    
														</a>
													</td>
												</tr>												
											</tbody>
									</table>
								</div>
					
					</div>
				</div>

				<div class="right_block float-lg-right  pl-lg-2">
					<div class="px-sm-4 px-2  mt-lg-0 block_style">
								<div class="maintain_head">
									<p class="float-left py-2 mt-2 px-3 ">常用部品維護</p>
									<a href="javascript:toggle_maintain()" class="float-right pt-3">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
										<title></title>
										<g id="icomoon-ignore">
										</g>
										<path d="M 607.5 205.5 l -178.5 178.5 l 178.5 178.5 l -45 45 l -178.5 -178.5 l -178.5 178.5 l -45 -45 l 178.5 -178.5 l -178.5 -178.5 l 45 -45 l 178.5 178.5 l 178.5 -178.5 Z" />
										</svg>
									</a>
								</div>
								<form  class="mt-0 mt-sm-2 mt-md-4 pt-md-2  maintain"  action="" method="GET">
									<div class="row w-100 ml-0">
										<p class="text-xl-left col-12 col-sm-3 col-md-2 col-lg-4 col-xl-auto  mt-0  mt-sm-2 mt-md-0 mt-lg-0 mt-xl-1 mb-2 mb-md-0  my-xl-1 ">群組名稱</p>
										<div class="col-11 col-sm-9 col-md-4  col-lg-8 col-xl-3 mt-0 mt-sm-2 mt-md-0 ml-3 ml-sm-0 ml-md-0   select">
											<select name="maintain_group">
												<option value="">煞車塊</option>
												<option value="">火星塞</option>
												<option value="">後視鏡</option>
												<option value="">大鎖</option>
												<option value="">排氣管</option>
											</select>
										</div>



										<p class="col-md-2 col-12 col-sm-3 col-lg-4 col-xl-3     mt-3 mb-2 mb-sm-0   mt-md-0 mt-sm-4 mt-lg-4 mt-xl-0 my-xl-1 text-xl-right">部品番號</p>
										<input  name="parts_code" class="col-11 col-md-4 col-sm-9 col-lg-8 col-xl-3 ml-3 ml-sm-0 ml-md-0 mt-md-0 mt-sm-4  mt-lg-4 mt-xl-0"  type="text">	
									</div>
									<div class="row w-100 ml-0  mt-md-3  mt-lg-0 mt-0">
										<p class="col-10 col-sm-3 col-md-2     col-lg-4  col-xl-auto mt-3 mt-sm-4 mt-md-0 mt-lg-4 mt-xl-4 mb-2 mb-sm-0  mb-xl-1  mr-xl-2  ml-0 pt-xl-1 pr-xl-5  text-xl-left" >名稱</p>
										<input  name="parts_name" class="col-11 col-sm-9 col-md-4   col-lg-8 col-xl-3 mt-sm-4  mt-md-0 mt-lg-4    ml-3 ml-sm-0 "  type="text">	

										<p class="col-10 col-sm-3 col-md-2  col-lg-4  col-xl-3 mt-3 mt-sm-4 mt-md-0 mt-lg-4 mb-2  mb-sm-0  ml-0 my-md-0  pt-xl-1 text-xl-right">備註</p>
										<input  name="ps" class="col-11 col-sm-9 col-md-4  col-lg-8  col-xl-3      mt-sm-4  mt-md-0 mt-lg-4  ml-3 ml-sm-0 ml-md-0 " type="text" >	

									</div>
									<div class="mt-4 pt-md-2 pt-0 ml-3 pt-xl-0 mt-xl-0 ml-xl-0">
										<button class="button_mt px-4 py-2 mt-4">
											<p class="float-left mb-0">新增</p>
											<svg class="float-left" fill="white" style="margin-top:1px; margin-left:1px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
											<title></title>
											<g id="icomoon-ignore">
											</g>
											<path d="M 608 352 h -192 v -192 c 0 -17.6 -14.4 -32 -32 -32 s -32 14.4 -32 32 v 192 h -192 c -17.6 0 -32 14.4 -32 32 s 14.4 32 32 32 h 192 v 192 c 0 17.6 14.4 32 32 32 s 32 -14.4 32 -32 v -192 h 192 c 17.6 0 32 -14.4 32 -32 s -14.4 -32 -32 -32 Z" />
											</svg>
										</button>
									</div>
								</form>
					</div>

					<div  class="px-sm-4 px-2 block_style">
								<div class="inquire_result2_head">
									<p class="float-left py-2 mt-2 px-3 mb-0">常用部品維護結果</p>
									<a href="javascript:toggle_inquire_result2()" class="float-right pt-3" >
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
										<title></title>
										<g id="icomoon-ignore">
										</g>
										<path d="M 607.5 205.5 l -178.5 178.5 l 178.5 178.5 l -45 45 l -178.5 -178.5 l -178.5 178.5 l -45 -45 l 178.5 -178.5 l -178.5 -178.5 l 45 -45 l 178.5 178.5 l 178.5 -178.5 Z" />
										</svg>
									</a>
								</div>
								<div class="table_wrapper mt-4 mCustomScrollbar content" data-mcs-theme="dark">
									<table border="0" class="mb-4">
											<thead>
												<tr>
													<th><p class="float-left mb-0 ml-3">群組名稱</p></th>
													<th>部品番號</th>
													<th>部品名稱</th>
													<th class="unsort">備註</th>
													<th class="text-center unsort">編輯</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>剎車塊</td>
													<td>13P-WF53A-00</td>
													<td>剎車塊組</td>
													<td>
														<input type="text">
													</td>
													<td class="text-center">
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>						
												</tr>

												<tr>
													<td>剎車塊</td>
													<td>1UF-W0045-01</td>
													<td>剎車車片組</td>
													<td>
														<input type="text">
													</td>
													<td class="text-center">
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>						
												</tr>	
												
												<tr>
													<td>剎車塊</td>
													<td>20A-W2534-10</td>
													<td>剎車塊組</td>
													<td>
														<input type="text">
													</td>
													<td class="text-center">
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>						
												</tr>	
												
												<tr>
													<td>剎車塊</td>
													<td>20A-W2534-11</td>
													<td>剎車塊組</td>
													<td>
														<input type="text">
													</td>
													<td class="text-center">
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>						
												</tr>		
												
												<tr>
													<td>剎車塊</td>
													<td>13P-WF53A-00</td>
													<td>剎車塊組</td>
													<td>
														<input type="text">
													</td>
													<td class="text-center">
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>						
												</tr>	
												
												<tr>
													<td>剎車塊</td>
													<td>1UF-W0045-01</td>
													<td>剎車車片組</td>
													<td>
														<input type="text">
													</td>
													<td class="text-center">
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>						
												</tr>		
												
												<tr>
													<td>剎車塊</td>
													<td>20A-W2534-10</td>
													<td>剎車塊組</td>
													<td>
														<input type="text">
													</td>
													<td class="text-center">
														<button>
															編輯
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="25" height="25" version="1.1">
															<title></title>
															<g id="icomoon-ignore">
															</g>
															<path d="M 663 225 l -58.5 58.5 l -120 -120 l 58.5 -58.5 c 12 -12 33 -12 45 0 l 75 75 c 12 12 12 33 0 45 Z M 96 552 l 354 -354 l 120 120 l -354 354 h -120 v -120 Z" />
															</svg>
														</button>
													</td>						
												</tr>						
											</tbody>
									</table>
								</div>
					
					</div>
				</div>


			</main>
			<!-- main ======================================================================================= -->
 		</div>
		<?php include "footer.php"; ?>
		<?php include "footer-js.php"; ?>

	</body>
</html>