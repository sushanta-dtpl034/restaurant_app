<x-app-layout>
<div class="row">
    <div class="col-lg-7 col-xl-8">
        <div class="card" data-iq-gsap="onStart"
      data-iq-opacity="0"
      data-iq-position-y="-40"
      data-iq-duration=".6"
      data-iq-delay=".4"
      data-iq-trigger="scroll"
      data-iq-ease="none">
            <div class="card-header">
                <h4 class="card-title">Sales Figures</h4>
                <small>2017-2018</small>
            </div>
            <div class="card-body" data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".6"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                <div id="admin-chart-1" class="admin-chart-1"></div>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12 col-xl-8">
                 <div class="card"
                 data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay=".5"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
                      <div class="card-body">
     
            <ul class="nav nav-tabs mb-4 nav-justified product-tab" id="myTabs" role="tablist">
               <li class="nav-item" role="presentation">
                  <button class="nav-link active text-start" id="todo-tab" data-bs-toggle="tab" data-chart="update" data-type="product" data-bs-target="#product" type="button" role="tab" aria-selected="true">Products</button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="customer-tab" data-bs-toggle="tab" data-chart="update" data-type="customer" data-bs-target="#customer" type="button" role="tab"  aria-selected="false">Customer</button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link text-end" id="members-tab" data-bs-toggle="tab" data-chart="update" data-type="member" data-bs-target="#members" type="button" role="tab" aria-selected="false">Members</button>
               </li>
            </ul>
       
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active" id="product" role="tabpanel">
                <h3>Products Sale</h3>
                <p class="mb-0">500 products</p>
               <div id="admin-chart-7" class="admin-chart-7"></div>
            </div>
         </div>
                      </div>
                 </div>
           </div>  
           <div class="col-lg-12 col-xl-4">
               <div class="card"
               data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay=".6"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                             <div class="avatar-75 mb-2 rounded bg-soft-primary text-center" style="line-height: 75px;">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="path-1-inside-1" fill="white">
                                <path d="M22.2652 5.05273C19.1066 5.05273 16.0066 5.91232 13.2925 7.54076C10.5783 9.16919 8.35071 11.5061 6.8448 14.3047C5.33889 17.1033 4.61054 20.2598 4.73664 23.441C4.86274 26.6222 5.83862 29.7101 7.56124 32.3787C9.28387 35.0472 11.6893 37.1975 14.5237 38.6025C17.3581 40.0075 20.5162 40.615 23.6647 40.361C26.8133 40.107 29.8353 39.0008 32.4119 37.1593C34.9885 35.3178 37.024 32.8093 38.3036 29.8985L33.7665 27.872C32.8489 29.9594 31.3892 31.7583 29.5415 33.0789C27.6938 34.3994 25.5266 35.1927 23.2688 35.3748C21.011 35.557 18.7463 35.1213 16.7137 34.1138C14.6811 33.1062 12.9561 31.5643 11.7208 29.6506C10.4855 27.7369 9.78569 25.5226 9.69526 23.2413C9.60483 20.96 10.1271 18.6964 11.207 16.6895C12.287 14.6826 13.8844 13.0068 15.8307 11.839C17.7771 10.6713 20.0001 10.0549 22.2652 10.0549V5.05273Z"/>
                                </mask>
                                <path d="M22.2652 5.05273C19.1066 5.05273 16.0066 5.91232 13.2925 7.54076C10.5783 9.16919 8.35071 11.5061 6.8448 14.3047C5.33889 17.1033 4.61054 20.2598 4.73664 23.441C4.86274 26.6222 5.83862 29.7101 7.56124 32.3787C9.28387 35.0472 11.6893 37.1975 14.5237 38.6025C17.3581 40.0075 20.5162 40.615 23.6647 40.361C26.8133 40.107 29.8353 39.0008 32.4119 37.1593C34.9885 35.3178 37.024 32.8093 38.3036 29.8985L33.7665 27.872C32.8489 29.9594 31.3892 31.7583 29.5415 33.0789C27.6938 34.3994 25.5266 35.1927 23.2688 35.3748C21.011 35.557 18.7463 35.1213 16.7137 34.1138C14.6811 33.1062 12.9561 31.5643 11.7208 29.6506C10.4855 27.7369 9.78569 25.5226 9.69526 23.2413C9.60483 20.96 10.1271 18.6964 11.207 16.6895C12.287 14.6826 13.8844 13.0068 15.8307 11.839C17.7771 10.6713 20.0001 10.0549 22.2652 10.0549V5.05273Z" stroke="#EA6A12" stroke-width="2" mask="url(#path-1-inside-1)"/>
                                <mask id="path-2-inside-2" fill="white">
                                <path d="M39.0428 27.8871C39.8135 25.4604 40.0303 22.8867 39.6775 20.352C39.3246 17.8174 38.411 15.3851 37.0026 13.2309C35.5943 11.0767 33.7263 9.25434 31.5337 7.89561C29.3411 6.53687 26.8787 5.67564 24.3243 5.37415L23.8213 10.0957C25.6715 10.3141 27.4551 10.9379 29.0432 11.922C30.6313 12.9061 31.9843 14.2261 33.0044 15.7864C34.0245 17.3467 34.6862 19.1084 34.9418 20.9443C35.1973 22.7802 35.0403 24.6443 34.4821 26.402L39.0428 27.8871Z"/>
                                </mask>
                                <path d="M39.0428 27.8871C39.8135 25.4604 40.0303 22.8867 39.6775 20.352C39.3246 17.8174 38.411 15.3851 37.0026 13.2309C35.5943 11.0767 33.7263 9.25434 31.5337 7.89561C29.3411 6.53687 26.8787 5.67564 24.3243 5.37415L23.8213 10.0957C25.6715 10.3141 27.4551 10.9379 29.0432 11.922C30.6313 12.9061 31.9843 14.2261 33.0044 15.7864C34.0245 17.3467 34.6862 19.1084 34.9418 20.9443C35.1973 22.7802 35.0403 24.6443 34.4821 26.402L39.0428 27.8871Z" stroke="#EA6A12" stroke-width="2" mask="url(#path-2-inside-2)"/>
                                <mask id="path-3-inside-3" fill="white">
                                <path d="M22.445 33.1201C24.3163 33.1201 26.1539 32.6185 27.7694 31.6667C29.3849 30.7149 30.7202 29.3471 31.6385 27.7037C32.5567 26.0602 33.0248 24.2001 32.9947 22.3142C32.9647 20.4283 32.4376 18.5844 31.4675 16.9714C30.4974 15.3585 29.1192 14.0347 27.4742 13.1357C25.8292 12.2366 23.9766 11.7947 22.1063 11.8553C20.236 11.9159 18.4153 12.4767 16.831 13.4803C15.2466 14.4839 13.9555 15.8942 13.0901 17.5665L16.4473 19.3316C17.0021 18.2594 17.8299 17.3552 18.8457 16.7117C19.8614 16.0683 21.0287 15.7087 22.2278 15.6699C23.427 15.6311 24.6147 15.9144 25.6694 16.4908C26.7241 17.0672 27.6077 17.916 28.2297 18.9501C28.8516 19.9841 29.1896 21.1664 29.2088 22.3755C29.2281 23.5846 28.928 24.7772 28.3393 25.8309C27.7506 26.8845 26.8944 27.7615 25.8587 28.3717C24.8229 28.9819 23.6448 29.3035 22.445 29.3035V33.1201Z"/>
                                </mask>
                                <path d="M22.445 33.1201C24.3163 33.1201 26.1539 32.6185 27.7694 31.6667C29.3849 30.7149 30.7202 29.3471 31.6385 27.7037C32.5567 26.0602 33.0248 24.2001 32.9947 22.3142C32.9647 20.4283 32.4376 18.5844 31.4675 16.9714C30.4974 15.3585 29.1192 14.0347 27.4742 13.1357C25.8292 12.2366 23.9766 11.7947 22.1063 11.8553C20.236 11.9159 18.4153 12.4767 16.831 13.4803C15.2466 14.4839 13.9555 15.8942 13.0901 17.5665L16.4473 19.3316C17.0021 18.2594 17.8299 17.3552 18.8457 16.7117C19.8614 16.0683 21.0287 15.7087 22.2278 15.6699C23.427 15.6311 24.6147 15.9144 25.6694 16.4908C26.7241 17.0672 27.6077 17.916 28.2297 18.9501C28.8516 19.9841 29.1896 21.1664 29.2088 22.3755C29.2281 23.5846 28.928 24.7772 28.3393 25.8309C27.7506 26.8845 26.8944 27.7615 25.8587 28.3717C24.8229 28.9819 23.6448 29.3035 22.445 29.3035V33.1201Z" stroke="#EA6A12" stroke-width="2" mask="url(#path-3-inside-3)"/>
                                <mask id="path-4-inside-4" fill="white">
                                <path d="M12.5622 18.6902C11.9893 20.1253 11.7489 21.6741 11.8588 23.2226C11.9687 24.7711 12.4261 26.2798 13.1973 27.6378C13.9686 28.9957 15.0339 30.1683 16.3151 31.0692C17.5962 31.9701 19.0605 32.5763 20.6002 32.8434L21.2072 29.1137C20.2295 28.9441 19.2997 28.5591 18.4862 27.9871C17.6727 27.415 16.9961 26.6704 16.5064 25.8081C16.0167 24.9459 15.7263 23.9878 15.6565 23.0045C15.5867 22.0213 15.7393 21.0378 16.1031 20.1265L12.5622 18.6902Z"/>
                                </mask>
                                <path d="M12.5622 18.6902C11.9893 20.1253 11.7489 21.6741 11.8588 23.2226C11.9687 24.7711 12.4261 26.2798 13.1973 27.6378C13.9686 28.9957 15.0339 30.1683 16.3151 31.0692C17.5962 31.9701 19.0605 32.5763 20.6002 32.8434L21.2072 29.1137C20.2295 28.9441 19.2997 28.5591 18.4862 27.9871C17.6727 27.415 16.9961 26.6704 16.5064 25.8081C16.0167 24.9459 15.7263 23.9878 15.6565 23.0045C15.5867 22.0213 15.7393 21.0378 16.1031 20.1265L12.5622 18.6902Z" stroke="#EA6A12" stroke-width="2" mask="url(#path-4-inside-4)"/>
                            </svg>
                        </div>
                        <h6 class="heading-title text-center">$18 378</h6>
                        </div>
                        <div class=" text-end">
                            <div>
                                <h6 class="heading-title mb-5">Total Sales</h6>
                            </div>
                            <div class="d-flex">
                                <div id="admin-chart-4"></div>
                                <h6 class="heading-title text-primary">+14% <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.77083 3.54199L9.77083 16.042" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.75213 8.58301L9.77213 3.54134L14.793 8.58301" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </h6>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="card"
               data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay=".7"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                             <div class="avatar-75 mb-2 rounded bg-soft-primary text-center" style="line-height: 75px;">
                            <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0316 21.7946C29.2493 21.7946 30.2714 22.7768 30.0852 23.9521C28.9929 30.8664 22.9364 36.0002 15.6319 36.0002C7.55035 36.0002 1 29.5983 1 21.7017C1 15.1958 6.05714 9.13557 11.7507 7.76533C12.9741 7.47011 14.228 8.3112 14.228 9.54219C14.228 17.8825 14.5148 20.04 16.1353 21.2134C17.7558 22.3869 19.6613 21.7946 28.0316 21.7946Z" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M35.9985 14.8492C36.0954 9.49073 29.3608 0.853355 21.1538 1.00189C20.5155 1.01303 20.0045 1.53291 19.976 2.1549C19.7689 6.56085 20.0482 12.2702 20.204 14.8585C20.2515 15.6643 20.8993 16.2974 21.7219 16.3438C24.4442 16.4961 30.4987 16.704 34.9423 16.0467C35.5464 15.9576 35.989 15.4452 35.9985 14.8492Z" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h6 class="heading-title text-center">$18 378</h6>
                        </div>
                        <div class=" text-end">
                            <div>
                                <h6 class="heading-title mb-5">Total Profit</h6>
                            </div>
                            <div class="d-flex">
                                <div id="admin-chart-5"></div>
                                <h6 class="heading-title text-primary">+0.4% <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.77083 3.54199L9.77083 16.042" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.75213 8.58301L9.77213 3.54134L14.793 8.58301" stroke="#EA6A12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </h6>
                            </div>
                        </div>
                    </div>
               </div>
           </div>      
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Specialities sales</h4>
            </div>
            <div class="card-body ">
                <div class="swiper-container d-slider5">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide text-center"
                        data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".5"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                     <x-circleprogressbar id="1" color="primary" value="65"  image="13.png" imgClass="circle-image" progressPercent="65%" progressTitle="Mix Vaggie Pizza"/>
                        </div>
                        <div class="swiper-slide text-center"
                        data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".5"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                     <x-circleprogressbar id="2" color="primary" value="50" image="11.png" imgClass="circle-image" progressPercent="50%" progressTitle="Sausage Pizza"/> 
                        </div>
                        <div class="swiper-slide text-center"
                        data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".5"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                     <x-circleprogressbar id="3" color="primary" value="55" image="12.png" imgClass="circle-image" progressPercent="55%" progressTitle="Shrikhand"/>
                        </div>
                        <div class="swiper-slide text-center"
                        data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".5"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                     <x-circleprogressbar id="4" color="primary" value="55" image="10.png" imgClass="circle-image" progressPercent="55%" progressTitle="Pasta"/>
                        </div>
                        <div class="swiper-slide text-center"
                        data-iq-gsap="onStart"
                     data-iq-opacity="0"
                     data-iq-position-y="-40"
                     data-iq-duration=".6"
                     data-iq-delay=".5"
                     data-iq-trigger="scroll"
                     data-iq-ease="none">
                     <x-circleprogressbar id="5" color="primary" value="65" image="13.png" imgClass="circle-image" progressPercent="65%" progressTitle="Pasta pizza"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay="1"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
             <div class="card-body">
                  <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div id="admin-chart-2" class="admin-chart-2">
                            </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <p class="mb-1 mt-3 mt-lg-0">
                            Food
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="heading-title fw-bolder">Paneer Chilly</h6>
                            <p class="mb-0 text-success">
                                +0.26%
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 mt-3 mt-lg-0">
                         <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="heading-title fw-bolder">Available</h6>
                            <h6 class="heading-title">85%</h6>
                        </div>
                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px">
                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-1 d-none d-block align-self-center">
                        <div class="float-end dropdown">
                            <svg width="5" role="img" height="20" viewBox="0 0 5 20" fill="none" xmlns="http://www.w3.org/2000/svg" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                            <circle cx="2.5" cy="3" r="2.5" fill="#07143B"/>
                            <circle cx="2.5" cy="10" r="2.5" fill="#07143B"/>
                            <circle cx="2.5" cy="17" r="2.5" fill="#07143B"/>
                            </svg>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
             </div>
        </div>
         <div class="card"
         data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay="1"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
             <div class="card-body">
                  <div class="row">
                    <div class="col-xl-4 col-md-6">
                        
                        <div id="admin-chart-3" class="admin-chart-3">
                            </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <p class="mb-1 mt-3 mt-lg-0">
                            Food
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="heading-title fw-bolder">Paneer Chilly</h6>
                            <p class="mb-0 text-success">
                                +0.26%
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 mt-3 mt-lg-0">
                         <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="heading-title fw-bolder">Available</h6>
                            <h6 class="heading-title">85%</h6>
                        </div>
                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px">
                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-1 d-none d-block align-self-center">
                        <div class="float-end dropdown">
                            <svg width="5" role="img" height="20" viewBox="0 0 5 20" fill="none" xmlns="http://www.w3.org/2000/svg" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                            <circle cx="2.5" cy="3" r="2.5" fill="#07143B"/>
                            <circle cx="2.5" cy="10" r="2.5" fill="#07143B"/>
                            <circle cx="2.5" cy="17" r="2.5" fill="#07143B"/>
                            </svg>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="600" data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay="1"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
            <div class="card-header border-0 pb-0">
                <div class="header-title">
                    <h4 class="card-title">User List</h4>         
                </div>
            </div>
            <div class="card-body py-0">
                <div class="table-responsive">
                    <table id="basic-table" class="table mb-0 iq-table user-list-table" role="grid">
                        <thead >
                            <tr>
                                <th>Customer</th>
                                <th>Address</th>
                                <th>Contacts</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                    <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="{{asset('images/avatars/06.png')}}" alt="profile">
                                    <p class="mb-0">Darrell Steward</p>
                                    </div>
                                </td>
                                <td>
                                    2715 Ash Dr. San Jose
                                </td>
                                <td>1234567890</td>
                                <td>
                                    abc123@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                    <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="{{asset('images/avatars/07.png')}}" alt="profile">
                                    <p class="mb-0">Jane Cooper</p>
                                    </div>
                                </td>
                                <td>
                                    6391 Elgin St. Celina
                                </td>
                                <td>1234567890</td>
                                <td>
                                    abc123@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                    <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="{{asset('images/avatars/08.png')}}" alt="profile">
                                    <p class="mb-0">Esther Howard</p>
                                    </div>
                                </td>
                                <td>
                                    2464 Royal Ln. Mesa
                                </td>
                                <td>1234567890</td>
                                <td>
                                    abc123@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                    <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="{{asset('images/avatars/09.png')}}" alt="profile">
                                    <p class="mb-0">Jacob Jones</p>
                                    </div>
                                </td>
                                <td>
                                    6391 Elgin St. Celina
                                </td>
                                <td>1234567890</td>
                                <td>
                                    abc123@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                    <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="{{asset('images/avatars/10.png')}}" alt="profile">
                                    <p class="mb-0">Jane Cooper</p>
                                    </div>
                                </td>
                                <td>
                                    6391 Elgin St. Celina
                                </td>
                                <td>1234567890</td>
                                <td>
                                    abc123@gmail.com
                                </td>
                            </tr>
                            <tr >
                                <td>
                                    <div class="d-flex align-items-center">
                                    <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="{{asset('images/avatars/08.png')}}" alt="profile">
                                    <p class="mb-0">Esther Howard</p>
                                    </div>
                                </td>
                                <td>
                                    6391 Elgin St. Celina
                                </td>
                                <td>1234567890</td>
                                <td>
                                    abc123@gmail.com
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-xl-4">
        <div class="card card-primary data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay=".8"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
            <div class="card-body row">
                <div class="col-xl-6 ">
                    <p class="text-white mt-3 mb-4">Total earning</p>
                    <h3 class="text-white mb-4">$ 4,85,963 </h3>
                    <a href="#" class="btn bg-white rounded-pill">View More</a>
                </div>
                <div class="col-xl-6 mt-md-0 mt-4">
                    <div class=" mb-4">
                    <a href="#" class="text-white btn border float-end rounded">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.0625 6.26931H13.9451" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.962 8.87283H10.9681" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.00103 8.87283H8.0072" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.04009 8.87283H5.04626" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.962 11.4636H10.9681" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.00103 11.4636H8.0072" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.04009 11.4636H5.04626" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.6955 1.33301V3.52686" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.3088 1.33301V3.52686" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8255 2.38574H5.18064C3.22285 2.38574 2 3.47636 2 5.48109V11.5142C2 13.5504 3.22285 14.6663 5.18064 14.6663H10.8193C12.7833 14.6663 14 13.5694 14 11.5646V5.48109C14.0062 3.47636 12.7895 2.38574 10.8255 2.38574Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Select
                    </a>
                </div>
                <div id="admin-chart-8"></div>
                </div>
            </div>
        </div>
        <div class="card"
        data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay="1"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
            <div class="card-header">
                <h4 class="card-title">Last Transaction</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('images/admin/01.png')}}" class="img-fluid rounded-pill  avatar-50" alt="1">
                        <div class="ms-3">
                            <h6 class="heading-title fw-bolder mb-2">Sausage Pizza</h6>
                            <p class="mb-0">20.01.2021</p>
                        </div>
                    </div>
                    <h6 class="heading-title">-$115,00</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('images/admin/02.png')}}" class="img-fluid rounded-pill  avatar-50" alt="2">
                        <div class="ms-3">

                            <h6 class="heading-title fw-bolder mb-2">Noodles</h6>
                            <p class="mb-0">20.01.2021</p>
                        </div>
                    </div>
                    <h6 class="heading-title">-$115,00</h6>
                </div>
                 <div class="d-flex justify-content-between align-items-center mb-5">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('images/admin/03.png')}}" class="img-fluid rounded-pill  avatar-50" alt="3">
                        <div class="ms-3">
                            <h6 class="heading-title fw-bolder mb-2">Pasta</h6>
                            <p class="mb-0">20.01.2021</p>
                        </div>
                    </div>
                    <h6 class="heading-title">-$115,00</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('images/admin/04.png')}}" class="img-fluid rounded-pill  avatar-50" alt="4">
                        <div class="ms-3">
                            <h6 class="heading-title fw-bolder mb-2">Burger</h6>
                            <p class="mb-0">20.01.2021</p>
                        </div>
                    </div>
                    <h6 class="heading-title">-$115,00</h6>
                </div>
                 <div class="d-flex justify-content-between align-items-center mb-5">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('images/admin/05.png')}}" class="img-fluid rounded-pill  avatar-50" alt="5">
                        <div class="ms-3">
                            <h6 class="heading-title fw-bolder mb-2">Sausage Pizza</h6>
                            <p class="mb-0">20.01.2021</p>
                        </div>
                    </div>
                    <h6 class="heading-title">-$115,00</h6>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('images/admin/06.png')}}" class="img-fluid rounded-pill avatar-50" alt="6">
                        <div class="ms-3">
                            <h6 class="heading-title fw-bolder mb-2">Cheese Pizza</h6>
                            <p class="mb-0">20.01.2021</p>
                        </div>
                    </div>
                    <h6 class="heading-title">-$115,00</h6>
                </div>
            </div>
        </div>
        <div class="card"
        data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay="1"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
             <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title mb-2">Earning Categories</h4>
                    <p class="mb-0">Heist Earnings Categories </p>
                </div>
                 <div class="dropdown float-end">
                     <a href="#" class="text-primary dropdown-toggle" id="dropdownMenuButton23" data-bs-toggle="dropdown" aria-expanded="false">
                        This Month
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton23">
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                     </ul>
                  </div>
            </div>
            <div class="card-body">
                <div id="admin-chart-6" ata-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay="1"
                  data-iq-trigger="scroll"
                  data-iq-ease="none"></div>
                <div class="row row-cols-md-12 row-cols-lg-3 g-3 g-lg-3 ">
                    <div class="col">
                        <div class="card  bg-soft-primary menu-card"
                        data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay="1"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
                            <div class="card-body">
                                <img src="{{asset('images/layouts/6.png')}}" class="avatar-45 img-fluid mb-3" alt="img">
                                <h6 class="heading-title">Food</h6>
                                <p class="mb-0">$450</p>
                            </div>
                        </div>
                    </div>
                     <div class="col">
                        <div class="card  bg-soft-primary mb-0 menu-card-2"
                        data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay="1"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
                            <div class="card-body">
                                <img src="{{asset('images/layouts/7.png')}}" class="avatar-45 img-fluid mb-3" alt="img">
                                <h6 class="heading-title"> Drink</h6>
                                <p class="mb-0">$100</p>
                            </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="card col bg-soft-primary mb-0 menu-card-3"
                        data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay="1"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
                            <div class="card-body">
                                <img src="{{asset('images/layouts/39.png')}}" class="avatar-45 img-fluid mb-3" alt="img">
                                <h6 class="heading-title">Desert</h6>
                                <p class="mb-0">$100</p>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
        <div class="card"
        data-iq-gsap="onStart"
                  data-iq-opacity="0"
                  data-iq-position-y="-40"
                  data-iq-duration=".6"
                  data-iq-delay=".9"
                  data-iq-trigger="scroll"
                  data-iq-ease="none">
            <div class="card-header">
                <h4 class="card-title">Top Menu Items</h4>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-5">
                    <div class="me-3">
                        <img src="{{asset('images/admin/07.png')}}" class="img-fluid rounded-pill  avatar-50" alt="">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="heading-title fw-bolder">Veg Cripsy</h6>
                            <h6 class="heading-title">67%</h6>
                        </div>
                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px">
                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> 
                <div class="d-flex align-items-center mb-5">
                    <div class="me-3">
                        <img src="{{asset('images/admin/08.png')}}" class="img-fluid rounded-pill  avatar-50" alt="">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="heading-title fw-bolder">Paneer Chilly</h6>
                            <h6 class="heading-title">40%</h6>
                        </div>
                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> 
                <div class="d-flex align-items-center mb-5">
                    <div class="me-3">
                        <img src="{{asset('images/admin/09.png')}}" class="img-fluid rounded-pill  avatar-50" alt="">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="heading-title fw-bolder">Creamy Nachos</h6>
                            <h6 class="heading-title">90%</h6>
                        </div>
                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> 
                 <div class="d-flex align-items-center mb-5">
                    <div class="me-3">
                        <img src="{{asset('images/admin/10.png')}}" class="img-fluid rounded-pill  avatar-50" alt="">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="heading-title fw-bolder">Veg kholapuri</h6>
                            <h6 class="heading-title">50%</h6>
                        </div>
                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> 
                <div class="d-flex align-items-center mb-5">
                    <div class="me-3">
                        <img src="{{asset('images/admin/11.png')}}" class="img-fluid rounded-pill  avatar-50" alt="">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="heading-title fw-bolder">Hot and Sour soup</h6>
                            <h6 class="heading-title">37%</h6>
                        </div>
                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> 
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <img src="{{asset('images/admin/12.png')}}" class="img-fluid rounded-pill  avatar-50" alt="">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="heading-title fw-bolder">Hot and Sour soup</h6>
                            <h6 class="heading-title">37%</h6>
                        </div>
                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 8px;">
                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
</x-app-layout>