<!doctype html>
<html lang="zh">
	<head>
		<?php include "header-title.php"; ?>		

	</head>
	<body>
		<div class="wp index" id="home">
      <?php include "header.php"; ?>
			<!-- main ======================================================================================= -->
			<main class="main">
			    <?php include "title.php"; ?>
				<div class="switch_group mt-3 ml-1">
					<label class="switch float-left mt-2 mr-3">
						<input id="search_form_switch" type="checkbox" checked>
						<span class="slider"></span>
					</label>
					<p class="float-left"style="line-height:1.4em" >查詢表單</p>

					<label  class="switch  float-left ml-4 mt-2 mr-3">
						<input id="reporter_table_switch" type="checkbox" checked>
						<span class="slider round"></span>
					</label>
					<p class="float-left"style="line-height:1.4em" >報表結果</p>
				</div>
				<div style="clear:both;"></div>
				<div class="px-2 px-sm-4  block_style">
							<div>
								<p class="float-left py-2 mt-2 px-3 ">查詢表單</p>
								<a href="javascript:toggle_search_form()" class="float-right pt-3" id="search_form_toggle_close">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
									<title></title>
									<g id="icomoon-ignore">
									</g>
									<path d="M 607.5 205.5 l -178.5 178.5 l 178.5 178.5 l -45 45 l -178.5 -178.5 l -178.5 178.5 l -45 -45 l 178.5 -178.5 l -178.5 -178.5 l 45 -45 l 178.5 178.5 l 178.5 -178.5 Z" />
									</svg>
								</a>
							</div>
							<form id="search_form" action="" method="GET">
								<div class="row pt-sm-3 pb-sm-1 mt-sm-4 pl-sm-0 mt-3 mx-0">
									<p class="col-12 col-sm-3 col-lg-auto col-xl-auto mt-0 mb-2 my-sm-0 my-xl-1">日期起訖</p>
									<input name="start_date" class="col-5 col-sm-4 col-lg-2 col-xl ml-sm-0  ml-3"  type="text">
									<p class="col-1 col-lg-auto   px-sm-2 px-1 mt-lg-0 my-0  mt-xl-1 text-center">-</p>
									<input  name="end_date" class="col-5 col-sm-4 col-lg-2 col-xl mr-lg-4  mr-max-1400"  type="text">		
												
									<p class="col-auto col-sm-3 col-lg-auto col-xl-auto  mt-3 mt-sm-4 mb-0 ml-0 ml-sm-0 mt-lg-0 my-xl-1 pr-lg-3 pl-lg-5">審核狀態</p>
									<input  name="audit_state" class="col-11 col-sm-9 col-lg-4 col-xl  mt-2 mt-sm-4 mt-lg-0 mr-sm-0 mr-lg-5 mr-0 ml-3 ml-sm-0 ml-xl-0 mr-max-1400" type="text">	

									<p class=" col-auto col-sm-3 col-lg-auto mt-3 mt-sm-4 mt-lg-4  ml-0 mb-0 mb-md-0 my-xl-1 pt-lg-0 pr-lg-3 ">客戶代號</p>		
									<input name="customer_code" class="col-11 col-sm-9 col-lg-4 col-xl  mt-2 mt-sm-4 mt-xl-0 mr-0 mr-lg-5 ml-3 ml-sm-0 mr-max-1400" type="text">

									<p class="col-auto col-sm-3 col-lg-auto  mt-3 mt-sm-4 mt-xl-0 mb-0 ml-lg-4 ml-xl-0 my-xl-1  pt-lg-0  pl-3 pl-lg-5  pr-lg-3 engine_code">引擎號碼</p>		
									<input name="engine_code" class="col-11 col-sm-9 col-lg-4 col-xl   mt-2 mt-sm-4 mt-xl-0 mr-0 mr-xl-0  mb-0 mb-lg-0 ml-3 ml-sm-0 ml-xl-0"   type="text">	
								</div>

								<button class="button_mt mt-4  ml-sm-0  px-4 py-2 ">
									查詢
									<svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15" version="1.1">
									<title></title>
									<g id="icomoon-ignore">
									</g>
									<path d="M 496.131 435.698 l -121.276 -103.147 c -12.537 -11.283 -25.945 -16.463 -36.776 -15.963 c 28.628 -33.534 45.921 -77.039 45.921 -124.588 c 0 -106.039 -85.961 -192 -192 -192 s -192 85.961 -192 192 s 85.961 192 192 192 c 47.549 0 91.054 -17.293 124.588 -45.922 c -0.5 10.831 4.68 24.239 15.963 36.776 l 103.147 121.276 c 17.661 19.623 46.511 21.277 64.11 3.678 s 15.946 -46.449 -3.677 -64.11 Z M 192 320 c -70.692 0 -128 -57.308 -128 -128 s 57.308 -128 128 -128 s 128 57.308 128 128 s -57.307 128 -128 128 Z" />
									</svg>
							
								</button>
							</form>
				</div>

				<div class="px-2  px-sm-4 block_style" >
							<div>
								<p class="float-left py-2 mt-2 px-3 mb-0">報表結果</p>
								<a href="javascript:toggle_index_reporter_table()" class="float-right pt-3" id="reporter_table_toggle_close">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 768 768" width="18" height="18" version="1.1">
									<title></title>
									<g id="icomoon-ignore">
									</g>
									<path d="M 607.5 205.5 l -178.5 178.5 l 178.5 178.5 l -45 45 l -178.5 -178.5 l -178.5 178.5 l -45 -45 l 178.5 -178.5 l -178.5 -178.5 l 45 -45 l 178.5 178.5 l 178.5 -178.5 Z" />
									</svg>
								</a>
							</div>
							<div class="table_wrapper mt-4 mCustomScrollbar content mb_20px" data-mcs-theme="dark">
								<table border="0"  class="mb-4" style="width:100%">
										<thead>
												<tr>
														<th>PD代碼</th>
														<th >客戶代號</th>
														<th>申請類別</th>
														<th>打刻類別 </th>
														<th>引擎號碼</th>
														<th>申請日期</th>
														<th>PD審核時間</th>
														<th >審核狀況</th>
														<th class="unsort" style="text-align:center">審核</th>
												</tr>
										</thead>
										<tbody>
												<tr>
														<td>091050</td>
														<td>展翔機車行</td>
														<td>引擎曲軸箱</td>
														<td>一般車禍、一般損傷</td>
														<td>5CA-108515</td>
														<td>2017/7/1</td>
														<td>2017/5/22下午&nbsp;08:10:00</td>
														<td>主管審核中</td>
														<td class="text-center">
															<button>
																審核
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
														<td>091010</td>
														<td>255301</td>
														<td>車架</td>
														<td>一般車禍、一般損傷</td>
														<td>E3B8E-630653</td>
														<td>2017/7/1</td>
														<td>2017/5/22下午&nbsp;08:10:00</td>
														<td>主管審核中</td>
														<td class="text-center">
															<button>
																審核
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
														<td>091020</td>
														<td>新潮</td>
														<td>引擎曲軸箱</td>
														<td>一般車禍、一般損傷</td>
														<td>E3M7E-103879</td>
														<td>2017/7/1</td>
														<td>2017/5/22下午&nbsp;08:10:00</td>
														<td>主管審核中</td>
														<td class="text-center">
															<button>
																審核
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
														<td>091010</td>
														<td>B06006勝星</td>
														<td>車架</td>
														<td>一般車禍、一般損傷</td>
														<td>E3E4E-59371</td>
														<td>2017/7/1</td>
														<td>2017/5/22下午&nbsp;08:10:00</td>
														<td>主管審核中</td>
														<td class="text-center">
															<button>
																審核
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
														<td>091010</td>
														<td>B06006勝星</td>
														<td>車架</td>
														<td>一般車禍、一般損傷</td>
														<td>E377E416976</td>
														<td>2017/7/1</td>
														<td>2017/5/22下午&nbsp;08:10:00</td>
														<td>主管審核中</td>
														<td class="text-center">
															<button>
																審核
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
														<td>091030</td>
														<td>B06006勝星</td>
														<td>其他專用部品</td>
														<td>不需打刻</td>
														<td>G3B5E-049882</td>
														<td>2017/7/1</td>
														<td>2017/5/22下午&nbsp;08:10:00</td>
														<td>主管審核中</td>
														<td class="text-center">
															<button>
																審核
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
														<td>091030</td>
														<td>C090250035中山</td>
														<td>磁石鑰匙</td>
														<td>不需打刻</td>
														<td>E373E-210345</td>
														<td>2017/7/1</td>
														<td>2017/5/22下午&nbsp;08:10:00</td>
														<td>主管審核中</td>
														<td class="text-center">
															<button >
																審核
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
				
			</main>
			<!-- main ======================================================================================= -->
 
		</div>
		<?php include "footer.php"; ?>
		<?php include "footer-js.php"; ?>
		<script>

		</script>
	</body>
</html>