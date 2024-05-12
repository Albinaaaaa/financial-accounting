// Default Laravel bootstrapper, installs axios
import './bootstrap';

// Added: Actual Bootstrap JavaScript dependency
import 'bootstrap';

// Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import jQuery from 'jquery';
window.$ = jQuery;

$(document).ready(function() {
    $('#type-id').on('change', function() {
        var selectedValue = $(this).val();
        // if (selectedValue == 1) {
        //
        // }
        $.ajax({
            url: 'get-additional-types/' + selectedValue,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var additionalTypesList = response.additionalTypes;
                console.log(additionalTypesList);
                var additionalTypes = $('#additional-types');
                additionalTypes.empty();
                additionalTypes.prop('disabled', false);
                //
                if (additionalTypesList && Object.keys(additionalTypesList).length > 0) {
                    $.each(additionalTypesList, function (key, value) {
                        additionalTypes.append('<option value="' + key + '">' + value + '</option>');
                    });
                } else {
                    // $('#additional-types').select2({
                    //     placeholder: 'Выберите значение'
                    // });
                }

                // var addtionalType = $('#additional-types');
                // addtionalType.empty();
                //
                // additionalTypesList.forEach(function(type) {
                //     addtionalType.append('<p>' + type + '</p>');
                // });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

