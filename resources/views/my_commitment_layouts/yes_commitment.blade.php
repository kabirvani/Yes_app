<div class="title">
    <p style="float: left;">YES Commitment</p>
</div>
<div class="yellow_line"></div>
<div class="content">
    <p class="yes_commitment_text">
    I acknowledge that as an organisation I am prepared to enter into a 12 month contract with eligible youth. I am prepared to pay them a salary (minimum ZAR3,500 per month) and offer them real work experience at my organisation or an SSME host.
    </p>
</div>
<div class="check_yes_commitment">
    <label class="container" for="read_accept_yes_commitment">I have read, understood and accept the YES Commitment
        <input name="read_accept_yes_commitment" id="read_accept_yes_commitment" class="read_accept_yes_commitment" type="checkbox" style="align-self:center;margin:0;">
        <span class="checkmark"></span>
    </label>
</div>

<style>
/* The container */
.container {
    max-width: initial;
  display: block;
  position: relative;
  padding-left: 45px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  font-family: Roboto;
  font-size: 14px;
  font-weight: normal;
  font-style: normal;
  font-stretch: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #ffffff;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: -1px;
  left: 0;
  height: 18px;
  width: 18px;
  background: #ffffff;
  border-radius: 2px;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    /* background-color: #d8d8d8;
    border: 2px solid #d8d8d8; */
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #ffffff;
  border: 2px solid #ffffff;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 3.5px;
    top: 0px;
    width: 7px;
    height: 11px;
    border: solid #f7a823;
    border-width: 0 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>