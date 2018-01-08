<!doctype html>
<html lang="zh">
	<head>
		<?php include "header-title.php"; ?>		
	</head>
	<body>
		<div class="wp page1" id="home">
      <?php include "header.php"; ?>
			<!-- main ======================================================================================= -->
			<main class="main">
				<?php include "title.php"; ?>
				<div class="switch_group mt-3 ml-1 row">
					<div class="col-auto">
						<label class="switch float-left mt-2">
							<input id="discount_switch" type="checkbox" checked>
							<span class="slider"></span>
						</label>
						<p class="float-left ml-3" style="line-height:1.4em" >現有折扣</p>
					</div>
					<div class="col-auto">

						<label  class="switch  float-left ml-sm-4 mt-2 ">
							<input id="add_newForm_switch" type="checkbox" checked>
							<span class="slider round"></span>
						</label>
						<p class="float-left ml-3" style="line-height:1.4em"> 新增表單</p>
						
					</div>
					<div class="col-auto">
						<label  class="switch  float-left ml-sm-4 mt-2">
							<input id="reporter_result_switch" type="checkbox" checked>
							<span class="slider round"></span>
						</label>
						<p class="float-left ml-3" style="line-height:1.4em"> 報表結果</p>
					</div>


				</div>
				<div style="clear:both;"></div>
				<div class="px-2 px-sm-4  block_style ">
					<div>
						<p class="float-left py-2 mt-2 px-3 ">現有折扣</p>
						<a href="javascript:toggle_discount()" class="float-right pt-3" id="search_form_toggle_close">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
							<title></title>
							<g id="icomoon-ignore">
							</g>
							<path d="M 607.5 205.5 l -178.5 178.5 l 178.5 178.5 l -45 45 l -178.5 -178.5 l -178.5 178.5 l -45 -45 l 178.5 -178.5 l -178.5 -178.5 l 45 -45 l 178.5 178.5 l 178.5 -178.5 Z" />
							</svg>
						</a>
					</div>
					<form  class="discount" action="" method="GET">
						<div class="row mt-3 mt-sm-4 mx-0 pt-sm-3 pb-sm-1 pb-md-0  pl-sm-0  ">
							<p class="col-auto col-sm-3 col-md-auto mt-0 mr-2 mb-2 mb-sm-0 ml-0  mr-sm-0  my-lg-0 my-xl-1">店家代號</p>
							<input name="store_code" class="col-11 col-sm-9 col-md-3 col-lg-3 col-xl-2 mt-0 mt-sm-0 mt-lg-0 mr-0 mr-sm-0  mr-lg-5 ml-3 ml-sm-0 ml-xl-0" type="text">
						
							<p class="offset-xl-1 col-auto  col-sm-3 col-md-auto mt-3  mt-sm-4 mt-md-0  mr-2 mr-sm-0 mr-md-2 mb-2  mb-sm-0 my-lg-0 my-xl-1 pl-3 ">查詢日期</p>
							<input  name="inquire_date" class="col-11 col-sm-9 col-md-3 col-lg-3 col-xl-2  mt-0 mt-sm-4 mt-lg-0 mr-0  mr-sm-0 mr-lg-5 mb-0  ml-3 ml-sm-0 ml-xl-0  my-md-0" style="width:151px;" type="text">	

							<div style="clear:both;"></div>	
						</div>
						<div>
							<button class="button_mt mt-4 px-4 py-2">
								<p class="float-left mb-0">查詢</p>
								<svg class="float-left mt-1 ml-1" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15" version="1.1">
								<title></title>
								<g id="icomoon-ignore">
								</g>
								<path d="M 496.131 435.698 l -121.276 -103.147 c -12.537 -11.283 -25.945 -16.463 -36.776 -15.963 c 28.628 -33.534 45.921 -77.039 45.921 -124.588 c 0 -106.039 -85.961 -192 -192 -192 s -192 85.961 -192 192 s 85.961 192 192 192 c 47.549 0 91.054 -17.293 124.588 -45.922 c -0.5 10.831 4.68 24.239 15.963 36.776 l 103.147 121.276 c 17.661 19.623 46.511 21.277 64.11 3.678 s 15.946 -46.449 -3.677 -64.11 Z M 192 320 c -70.692 0 -128 -57.308 -128 -128 s 57.308 -128 128 -128 s 128 57.308 128 128 s -57.307 128 -128 128 Z" />
								</svg>
							</button>
							<button class="button_mt mt-4 px-4 py-2">
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
				<div  class="px-2 px-sm-4   block_style ">
							<div>
								<p class="float-left py-2 mt-2 px-3 ">新增表單</p>
								<a href="javascript:toggle_add_new_form()" class="float-right pt-3" id="search_form_toggle_close">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
									<title></title>
									<g id="icomoon-ignore">
									</g>
									<path d="M 607.5 205.5 l -178.5 178.5 l 178.5 178.5 l -45 45 l -178.5 -178.5 l -178.5 178.5 l -45 -45 l 178.5 -178.5 l -178.5 -178.5 l 45 -45 l 178.5 178.5 l 178.5 -178.5 Z" />
									</svg>
								</a>
							</div>
							<form  class="add_new_form " action="" method="GET">
								<div class="row mt-3 mt-sm-4 mx-0 pt-sm-3 pb-sm-1 pl-sm-0">
									<p class="col-12  col-sm-3 col-lg-auto mt-1 mt-sm-0  mr-2 mr-sm-0 mb-2 mb-sm-0  my-0 my-lg-0 my-xl-1">店家代號</p>
									<input name="store_code" class="col-11 col-sm-9 col-lg-3 col-xl-2  mt-0 ml-3 ml-sm-0  ml-xl-0 store_code_input " type="text">
                                
									<p class="col-12 col-sm-3 col-lg-2 col-xl-auto  mt-3 mt-sm-4 mb-2  ml-lg-5  ml-xl-0 my-sm-0 my-lg-0 my-xl-1">日期起訖</p>
									<input name="start_date" class="col-5 col-sm-4 col-lg-2 col-xl  mt-sm-4 mt-lg-0 ml-3 ml-sm-0"  type="text">
									<p class="col-1 col-lg-auto mt-sm-4 mt-lg-0 mt-xl-1 my-0  px-1 px-sm-2  text-center">-</p>
									<input  name="end_date" class="col-5 col-lg-2 col-sm-4 col-xl  mt-sm-4 mt-lg-0  " type="text">	   

                                    <p class="col-auto col-sm-3 col-lg-auto mt-3 mt-sm-4  mt-lg-4 mt-xl-0   mb-0  ml-0 my-lg-0 my-xl-1 pt-lg-0 pr-lg-3 discount_type">折扣類型</p>

									<div class="col-11 col-sm-9 col-lg-3 col-xl mt-2 mt-sm-4  mt-xl-0 mr-0   ml-3 ml-sm-0    select">
										<select name="discount_type">
											<option value="">YSP</option>
											<option value="">AAA</option>
											<option value="">BBB</option>
											<option value="">CCC</option>
											<option value="">DDD</option>
										</select>
									</div>
									<p class=" discount_ratio col-auto col-sm-3 col-lg-2 col-xl-auto mt-3 mt-sm-4 mt-lg-4 mb-0 ml-0 ml-lg-5 ml-xl-0 my-lg-0 my-xl-1 pt-lg-0  pr-lg-3 pr-xl-1 px-sm-0 px-xl-3">折扣比率(%)</p>
									<input  name="discount_ratio" class="col-11 col-sm-9 col-lg-3 col-xl mt-2 mt-sm-4  mt-xl-0  mr-0 mb-4 mb-sm-0 ml-3 ml-sm-0  " type="text">	

									<div style="clear:both;"></div>	
								</div>
								<button class="button_mt px-4 py-2 mt-4">
									<p class="float-left mb-0 ">確定</p>
									<svg class="float-left" style="margin-top:1px; margin-left:1px;" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
									<title></title>
									<g id="icomoon-ignore">
									</g>
									<path d="M 608 352 h -192 v -192 c 0 -17.6 -14.4 -32 -32 -32 s -32 14.4 -32 32 v 192 h -192 c -17.6 0 -32 14.4 -32 32 s 14.4 32 32 32 h 192 v 192 c 0 17.6 14.4 32 32 32 s 32 -14.4 32 -32 v -192 h 192 c 17.6 0 32 -14.4 32 -32 s -14.4 -32 -32 -32 Z" />
									</svg>
								</button>
							</form>
				</div>
				<div  class="px-sm-4 px-2 block_style">
							<div class="reporter_head">
								<p class="float-left  mt-2 mb-1 mb-xl-0 py-2  px-3">報表結果</p>
								<a href="javascript:toggle_reporter_table()" class="float-right pt-3" id="reporter_table_toggle_close">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
									<title></title>
									<g id="icomoon-ignore">
									</g>
									<path d="M 607.5 205.5 l -178.5 178.5 l 178.5 178.5 l -45 45 l -178.5 -178.5 l -178.5 178.5 l -45 -45 l 178.5 -178.5 l -178.5 -178.5 l 45 -45 l 178.5 178.5 l 178.5 -178.5 Z" />
									</svg>
								</a>
								<div class="file_select">

								</div>
								      
                                <div class="row float-xl-right mr-0 mr-xl-3 pt-sm-2 pt-xl-0  link_list">
                              
                                    <div class="col-auto ml-sm-3 ml-xl-0 pt-1 pr-1 pr-sm-3  pl-1 pl-sm-3">
										<p class="float-left mb-0 mr-1  ">匯入EXCEL</p>
										<svg class="float-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" version="1.1">
										<title></title>
										<g id="icomoon-ignore">
										</g>
										<path d="M 371.514 192 h -67.646 l -47.866 70.516 l -47.871 -70.516 h -67.645 l 81.081 121.232 l -91.486 134.768 h 125.919 v -45.788 h -25.078 l 25.078 -37.497 l 55.698 83.285 h 70.222 l -91.488 -134.768 l 81.082 -121.232 Z" />
										<path d="M 458.903 114.538 c -11.105 -15.146 -26.587 -32.85 -43.589 -49.852 s -34.706 -32.482 -49.852 -43.589 c -25.787 -18.91 -38.296 -21.097 -45.462 -21.097 h -248 c -22.056 0 -40 17.944 -40 40 v 432 c 0 22.056 17.943 40 40 40 h 368 c 22.056 0 40 -17.944 40 -40 v -312 c 0 -7.166 -2.186 -19.675 -21.097 -45.462 v 0 Z M 392.687 87.313 c 15.35 15.35 27.4 29.199 36.29 40.687 h -76.977 v -76.973 c 11.491 8.89 25.339 20.939 40.687 36.286 v 0 Z M 448 472 c 0 4.336 -3.664 8 -8 8 h -368 c -4.336 0 -8 -3.664 -8 -8 v -432 c 0 -4.336 3.664 -8 8 -8 c 0 0 247.978 -0.001 248 0 v 112 c 0 8.836 7.162 16 16 16 h 112 v 312 Z" />
										</svg>
									</div>
                                    <div class="col-auto pt-1 pr-1 pr-sm-3 pl-1 pl-sm-3 ">
										<p class="float-left mb-0 ">下載格式</p>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="20" height="20" version="1.1">
										<title></title>
										<g id="icomoon-ignore">
										</g>
										<path d="M 160.5 576 h 447 v 64.5 h -447 v -64.5 Z M 607.5 288 l -223.5 223.5 l -223.5 -223.5 h 127.5 v -192 h 192 v 192 h 127.5 Z" />
										</svg>
									</div>
                                    <div class="col-auto pt-1 pr-1 pr-sm-3 pl-1 pl-sm-3 ">
										<p class="float-left mb-0 mr-1">匯出資料</p>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20" height="20" version="1.1">
										<title></title>
										<g id="icomoon-ignore">
										</g>
										<path d="M 480 480 h -416 v -288 h 83.04 c 0 0 22.048 -28.672 69.44 -64 h -184.48 c -17.696 0 -32 14.368 -32 32 v 352 c 0 17.696 14.304 32 32 32 h 480 c 17.696 0 32 -14.304 32 -32 v -119.872 l -64 52.64 v 35.232 Z M 427.552 257.6 v 113.632 l 212.448 -166.432 l -212.448 -159.968 v 100.192 c -257.952 0 -257.952 254.976 -257.952 254.976 c 73.024 -119.936 117.952 -142.4 257.952 -142.4 Z" />
										</svg>
									</div>
                                </div>
								
								<div class="file-upload float-xl-right float-left ml-sm-3 ml-sm-0">
									<div class="file-select">
										<div class="file-select-button float-left" id="fileName">選擇檔案</div>
											<div class="file-select-name float-left" id="noFile">未選擇任何檔案</div> 								
										<input type="file" name="chooseFile" id="chooseFile">
									</div>
								</div>
							</div>
							<div class="table_wrapper mt-4 mCustomScrollbar content mb_20px" data-mcs-theme="dark">
								<table border="0" class="mb-4">
										<thead>
											<tr>
												<th><p class="float-left mb-0 ml-3">店家代碼</p></th>
												<th>折扣類型</th>
												<th>折扣比率</th>
												<th>開始時間 </th>
												<th>結束時間</th>
												<th class="text-center unsort" style="width:5%;" >編輯</th>
												<th class="text-center unsort">移除</th>
											</tr>
										</thead>
										<tbody>
												<tr>
														<td>091050</td>
														<td>P</td>
														<td>8%</td>
														<td>2017/5/1</td>
														<td>2017/7/1</td>
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
														<td>091050</td>
														<td>P</td>
														<td>8%</td>
														<td>2017/5/1</td>
														<td>2017/7/1</td>
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
														<td>091050</td>
														<td>P</td>
														<td>8%</td>
														<td>2017/5/1</td>
														<td>2017/7/1</td>
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
														<td>091050</td>
														<td>P</td>
														<td>8%</td>
														<td>2017/5/1</td>
														<td>2017/7/1</td>
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
														<td>091050</td>
														<td>P</td>
														<td>8%</td>
														<td>2017/5/1</td>
														<td>2017/7/1</td>
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
														<td>091050</td>
														<td>P</td>
														<td>8%</td>
														<td>2017/5/1</td>
														<td>2017/7/1</td>
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
														<td>091050</td>
														<td>P</td>
														<td>8%</td>
														<td>2017/5/1</td>
														<td>2017/7/1</td>
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
				
			</main>
			<!-- main ======================================================================================= -->
		</div>
		<?php include "footer.php"; ?>
		<?php include "footer-js.php"; ?>

	</body>
</html>