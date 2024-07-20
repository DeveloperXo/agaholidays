// lead search-bar
const lead_search_input = document.querySelector('#leadSearchInput');
const lead_suggestions = document.querySelector('.suggestions');
const lead_options_childs = document.querySelectorAll('.lead .suggestions .option-child');

if ( lead_search_input ) {
    lead_search_input.addEventListener('click', (e) => {
        lead_suggestions.classList.toggle('active');
        if (window.innerHeight - e.clientY >= 300) {
            lead_suggestions.classList.toggle('active-top');
        } else {
            lead_suggestions.classList.toggle('active-bottom');
        }
    });

    lead_options_childs.forEach(e => {
        e.addEventListener('click', () => { 
            lead_search_input.value = e.dataset.value;
            lead_suggestions.classList.remove('active');
            lead_suggestions.classList.remove('active-top');
            lead_suggestions.classList.remove('active-bottom');
        })
    })

}

// format all prices
const format_price_elements = document.querySelectorAll('.format-price');

if ( format_price_elements.length > 0 ) {
    format_price_elements.forEach(e => {
        if ( e.dataset.value ) {
            e.innerHTML = Number(e.dataset.value).toLocaleString('en-IN');
        }
    })
}

// package image gallery - spotlight
const show_package_images_btns = document.querySelectorAll('.show_package_images_btn');

if ( show_package_images_btns.length > 0 ) {
    show_package_images_btns.forEach(elem => {
        elem.onclick = () => {
            const images_string = elem.dataset.images;
            const path = elem.dataset.path;
        
            if ( images_string ) {
                const images_array = JSON.parse(images_string);
                const gallery = images_array.map(e => ({ src: `${path}/${e.url}` }));
        
                Spotlight.show(gallery, {});
            }
        }
    })
}

// collapse package filter accordions in smaller devices
const package_accordion_collapse_btns = document.querySelectorAll('.packages_accordion_btn');
const packages_accordion_collapses = document.querySelectorAll('.packages_accordion_collapse');

if ( package_accordion_collapse_btns.length > 0 ) {
    const collapsible_width = 992;
    if ( window.innerWidth <= collapsible_width ) {
        package_accordion_collapse_btns.forEach((e, i) => {
            e.classList.add('collapsed');
            packages_accordion_collapses[i] && 
            packages_accordion_collapses[i].classList.remove('show');
        });
    }
}

// package filter input slider - src = codepen

// Controls the slider using from Input....
function controlFromInput(fromSlider, fromInput, toInput, controlSlider) {
    const [from, to] = getParsed(fromInput, toInput);
    fillSlider(fromInput, toInput, "#C6C6C6", "#dd4600b2", controlSlider);
    fromSlider.value = from;

    if (from > to) {
        fromSlider.value = to;
        fromInput.value = to;
    } else {
        fromSlider.value = from;
    }
}

// Controls the slider using to Input....
function controlToInput(toSlider, fromInput, toInput, controlSlider) {
    const [from, to] = getParsed(fromInput, toInput);
    fillSlider(fromInput, toInput, "#C6C6C6", "#dd4600b2", controlSlider);
    setToggleAccessible(toInput);
    toSlider.value = to;
    toInput.value = to;

    if (from <= to) {
        toSlider.value = to;
        toInput.value = to;
    } else {
        toInput.value = from;
    }
}

// Sliding event of the From slider
function controlFromSlider(fromSlider, toSlider, fromInput) {
    const [from, to] = getParsed(fromSlider, toSlider);
    fillSlider(fromSlider, toSlider, "#C6C6C6", "#dd4600b2", toSlider);
    fromInput.value = from;
    if (from > to) {
        fromInput.value = to;
        toInput.value = from;
    }
}

// Sliding event of the To slider
function controlToSlider(fromSlider, toSlider, toInput) {
    const [from, to] = getParsed(fromSlider, toSlider);
    fillSlider(fromSlider, toSlider, "#C6C6C6", "#dd4600b2", toSlider);
    setToggleAccessible(toSlider);
    toSlider.value = to;
    toInput.value = to;
    if (from > to) {
        fromInput.value = to;
        toInput.value = from;
    }
}

// Parsign values of the Inputs
function getParsed(currentFrom, currentTo) {
    const from = parseInt(currentFrom.value, 10);
    const to = parseInt(currentTo.value, 10);
    return [from, to];
}

// Changing and Filling the color in the selected part...
function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
    let rangeDistance = to.max - to.min;
    let fromPosition = from.value - to.min;
    let toPosition = to.value - to.min;
    if (fromPosition > toPosition) {
        let spare = fromPosition;
        fromPosition = toPosition;
        toPosition = spare;
    }
    controlSlider.style.background = `linear-gradient(
        to right,
        ${sliderColor} 0%,
        ${sliderColor} ${(fromPosition / rangeDistance) * 100}%,
        ${rangeColor} ${(fromPosition / rangeDistance) * 100}%,
        ${rangeColor} ${(toPosition / rangeDistance) * 100}%, 
        ${sliderColor} ${(toPosition / rangeDistance) * 100}%, 
        ${sliderColor} 100%)`;
}

// Making sure the toggle which we are using is accesible to change the range
function setToggleAccessible(currentTarget) {
    const toSlider = document.querySelector("#toSlider");
    if (Number(currentTarget.value) <= 0) {
        toSlider.style.zIndex = 2;
    } else {
        toSlider.style.zIndex = 0;
    }
}

const fromSlider = document.querySelector("#fromSlider");
const toSlider = document.querySelector("#toSlider");
const fromInput = document.querySelector("#fromInput");
const toInput = document.querySelector("#toInput");

// Initially filling the slider using default values...
if ( fromSlider ) {
    fillSlider(fromSlider, toSlider, "#C6C6C6", "#dd4600b2", toSlider);
    setToggleAccessible(toSlider);
    
    // Assigning listner methonds to respective events.
    fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput);
    toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput);
    fromInput.oninput = () => controlFromInput(fromSlider, fromInput, toInput, toSlider);
    toInput.oninput = () => controlToInput(toSlider, fromInput, toInput, toSlider);
}