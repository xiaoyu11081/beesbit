/* ==============================================================================
 * www.sucaijiayuan.com
 */
;
(function($) {
  $.fn.spinner = function(opts) {
    return this.each(function() {
      var defaults = {
        value: 45,
        min: 45,
        default: 0
      }
      var options = $.extend(defaults, opts)
      var keyCodes = {
        up: 38,
        down: 40
      }
      var container = $('.spinner')
      // container.addClass('')
      var textField = $(this).addClass('form-control').val(options.value)
        .bind('keyup paste change input keydown', function(e) {
          var field = $(this)
          var val = $(".spinnerExample")
          if (e.keyCode == keyCodes.up) changeValue(45), text = val.val(), val.attr("value", text)
          else if (e.keyCode == keyCodes.down) changeValue(-45), text = val.val(), val.attr("value", text)
          else if (getValue(field) != container.data('lastValidValue')) validateAndTrigger(field)
        })
      // textField.wrap(container)
      // var day = $('<div class="input-group-append"><label class="input-group-text" for="inputGroupSelect01">MH/S</label></div>').click(function() {})
      var increaseButton = $('<button class="increase button button-raised button-square" type="button"><i class="fa fa-plus fa-fw"></i></button>').click(function() {
        changeValue(45)
        var val = $("#power");
        var value_1 = $("#power").val();
        var value_2 = $("#morePower").val();
        var text = val.val();
        val.attr("value", text);
        $("#morePower").val(text / 45)
        // console.log(value_1);
      })
      var decreaseButton = $('<button class="decrease button button-raised button-square" type="button"><i class="fa fa-minus fa-fw"></button>').click(function() {
        changeValue(-45)
        var val = $("#power");
        var value_1 = $("#power").val();
        var value_2 = $("#morePower").val();
        var text = val.val();
        val.attr("value", text);
        $("#morePower").val(text / 45)
        // console.log(value_1);
      })
      var checkInput = $('<input id="morePower" type="tel" class="form-control text-center" value="1" min="0">').bind('input propertychange', function() {
        // changeValue(45)
        var val = $("#power");
        var value_1 = $("#power").val();
        var value_2 = $("#morePower").val();
        value_1 = value_2 * 45;
        if (!isNaN(value_2)) {
          $("#power").val(value_1);
        } else {
          $("#morePower").val(1);
          $("#power").val(45);
        }
        if (this.value.length == 1) {
          this.value = this.value.replace(/[^1-9]/g, '')
        } else {
          this.value = this.value.replace(/\D/g, '')
        }
        if (this.value.length == 1) {
          this.value = this.value.replace(/[^1-9]/g, '')
        } else {
          this.value = this.value.replace(/\D/g, '')
        }
        $powernum = $("#morePower").val();
        if ($powernum < 1 || isNaN($powernum)) {
          $("#morePower").val(1);
          $("#power").val(45);
        }
      })
      // var checkInput = $('<input id="morePower" type="tel" class="form-control text-center" value="1" min="0">').on("keyup", function() {
      //   if (this.value.length == 1) {
      //     this.value = this.value.replace(/[^1-9]/g, '')
      //   } else {
      //     this.value = this.value.replace(/\D/g, '')
      //   }
      // })
      // var checkInput = $('<input id="morePower" type="tel" class="form-control text-center" value="1" min="0">').on("keypress", function() {
      //   if (this.value.length == 1) {
      //     this.value = this.value.replace(/[^1-9]/g, '')
      //   } else {
      //     this.value = this.value.replace(/\D/g, '')
      //   }
      // })
      validate(textField)
      container.data('lastValidValue', options.value)
      textField.after(increaseButton)
      textField.after(checkInput)
      textField.after(decreaseButton)
      // textField.after(day)
      function changeValue(delta) {
        textField.val(getValue() + delta)
        validateAndTrigger(textField)
      }

      function validateAndTrigger(field) {
        clearTimeout(container.data('timeout'))
        var value = validate(field)
        if (!isInvalid(value)) {
          textField.trigger('update', [field, value])
        }
      }

      function validate(field) {
        var value = getValue()
        if (value <= options.min) decreaseButton.attr('disabled', 'disabled')
        else decreaseButton.removeAttr('disabled')
        field.toggleClass('invalid', isInvalid(value)) //.toggleClass('invalid', value === 0)
        if (isInvalid(value)) {
          var timeout = setTimeout(function() {
            textField.val(container.data('lastValidValue'))
            validate(field)
          }, 1)
          container.data('timeout', timeout)
        } else {
          container.data('lastValidValue', value)
        }
        return value
      }

      function isInvalid(value) {
        return isNaN(+value) || value < options.min;
      }

      function getValue(field) {
        field = field || textField;
        return parseInt(field.val() || 0, 10)
      }
    })
  }
})(jQuery)
