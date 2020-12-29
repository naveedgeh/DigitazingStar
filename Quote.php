
</head>

<body>


  <main id="main">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div style="max-width:80%;margin:auto" class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thank You For Your Quote</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


          <!-- ======= Contact Section ======= -->

        <section style="padding:15px 0px;" id="contact" class="contact">
            <div class="container">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" data-rule="minlen:4" data-msg="Please type your phone Number" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>

              <div class="form-row">
                <div class="col-md-6 form-group">
                    <select name="order_type" class="form-control" id="order_type" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                      <option value="digitiz">Order Type</option>
                      <option value="digitiz">Digitize</option>
                      <option value="">Vectorize</option>
                    </select>
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group select">
                  <input type="file" class="form-control" name="file" id="email" placeholder="Upload Your file" data-rule="file" data-msg="Please upload picture or zip file" />
                  <div class="validate"></div>
                </div>
              </div>

              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" Name="submit" >Send Quote</button></div>
            </form>

          </div>

        </section><!-- End Contact Section -->

          </div>

        </div>
      </div>
    </div>



  </main><!-- End #main -->



</body>

</html>
