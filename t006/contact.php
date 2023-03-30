<div class="contact-section text-white">
	<div class="block mx-auto">
		<div class="box mx-auto">
			<div class="title-inner mb-4 mb-lg-5 pb-1">
				<div class="title position-relative fs-55 lh-12">
					<span class="d-block"> WE’D LOVE TO</span>
					<span class="d-block">HEAR FROM YOU</span>
				</div>
				<p>歡迎留下您的基本資料，我們將安排專人與您連繫。</p>
			</div>
			<div class="form-inner">
				<form id="postForm" name="postForm" method="post" action="">
					<div class="row row-cols-lg-2 gx-5 mb-lg-4">
						<div class="mb-2 mb-lg-0">
							<div class="form-group">
								<label for="name">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名&nbsp;*</label>
								<input id="names" name="names" type="text">
							</div>
						</div>
						<div class="mb-2 mb-lg-0">
							<div class="form-group">
								<label for="tel">電&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;話&nbsp;*</label>
								<input id="tel" name="tel" type="text">
							</div>
						</div>
					</div>
					<div class="row row-cols-lg-2 gx-5">
						<div class="mb-2 mb-lg-0">
							<div class="form-group">
								<label for="email">電子信箱&nbsp;*</label>
								<input id="email" name="email" type="email">
							</div>
						</div>
						<div class="mb-2 mb-lg-0">
							<div class="form-group">
								<label for="VerificationCode">驗&nbsp;證&nbsp;碼&nbsp;*</label>
								<div class="d-flex flex-grow-1">
								<input id="VerificationCode" name="VerificationCode" type="text" autocomplete="off">
								<!--<img src="/styles/images/common/verification.webp" alt="東煒大局">-->
                                <a id="reload-img" alt="點擊刷新驗證碼" href="#1" draggable="false">
                                    <img src="s_code.php" id="rand-img" border="0"  alt="點擊刷新驗證碼" draggable="false">
                                </a>

								</div>
							</div>
						</div>
					</div>
					<div class="d-md-flex justify-content-between align-items-end mt-lg-4 pt-3">
						<div class="fs-16" style="color:#BBBBBB;">
							<span class="d-block">你所登錄的個人資料將做為以下用途</span>
							<ol style="padding-left: 22px;">
								<li>本網站所載之相關事項通知  </li>
								<li>客戶管理與服務</li>
								<li>本公司行銷業務之推廣本案實際內容以現場公布為準</li>
							</ol>
						</div>
						<button class="submit d-flex align-items-center fs-18 ms-auto mt-4 mt-lg-0" type="submit">
							<span class="notoSerifTC pe-3">送出表單</span>
							<img src="/styles/images/common/arrow.png" alt="">
							<span class="circle d-block"></span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="failureModal" tabindex="-1" aria-labelledby="failureModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
		<div class="modal-body">
			請輸入正確資料
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
		<div class="modal-body">
			<img src="/styles/images/common/contact-build.webp" alt="東煒大局">
			<div class="text">
				<p class="fs-28 fw-bold">表單已成功送出</p>
				<p class="fs-18 mb-4">請耐心等候一些時間，客服人員將盡速與您聯繫，謝謝！</p>
				<button type="button" class="btn bg-hover-golden" data-bs-dismiss="modal">關閉</button>
			</div>
			</div>
		</div>
	</div>
</div>
