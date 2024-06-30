<div class="accordion" id="packageSidebar_1">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Search
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" >
            <div class="accordion-body">
                <div class="search-form-wrap">
                    <form class="search-form">
                        <input class="form-control" type="text" placeholder="Type here" />
                        <input class="btn btn-primary mt-3 w-100 " type="submit" value="Search" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                Filters
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse show" >
            <div class="accordion-body">
                <h5 class="filter-title">Filter Price</h5>
                <div class="price-filter-form-wrap">
                    <form class="price-filter-form">
                        <div class="range_container">
                            <div class="sliders_control">
                                <input id="fromSlider" type="range" value="10" min="10" max="100" />
                                <input id="toSlider" type="range" value="100" min="10" max="100" />
                            </div>
                            <div class="form_control">
                                <div class="form_control_container d-flex align-items-center gap-2">
                                    <div class="form_control_container__time">Min</div>
                                    <input class="form_control_container__time__input" type="number" id="fromInput" value="10" min="10" max="100" readonly />
                                </div>
                                <div class="form_control_container d-flex align-items-center gap-2">
                                    <div class="form_control_container__time">Max</div>
                                    <input class="form_control_container__time__input" type="number" id="toInput" value="40" min="0" max="100" readonly />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <hr />

                <h5 class="filter-title mb-3">Category</h5>

                <div class="check-filter">
                    <ul class="check-ul">
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">Cat 1</label></li>
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">Cat 2</label></li>
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">Cat 3</label></li>
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">Cat 4</label></li>
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">Cat 5</label></li>
                    </ul>
                </div>

                <hr />

                <h5 class="filter-title mb-3">Duration</h5>

                <div class="check-filter">
                    <ul class="check-ul">
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">0 - 3 hours</label></li>
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">3 - 5 hours</label></li>
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">5 - 7 hours</label></li>
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">+7 hours</label></li>
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">1 - 3 days</label></li>
                        <li><input class="filter-checkbox" type="checkbox" id="cat-catname" /><label for="cat-catname">+3 days</label></li>
                    </ul>
                </div>

                <input class="btn btn-primary mt-3 w-100 " type="submit" value="Apply" />

            </div>
        </div>
    </div>
</div>

<script>
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
    console.log([from, to]);
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
    fillSlider(fromSlider, toSlider, "#C6C6C6", "#dd4600b2", toSlider);
    setToggleAccessible(toSlider);

    // Assigning listner methonds to respective events.
    fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput);
    toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput);
    fromInput.oninput = () =>
    controlFromInput(fromSlider, fromInput, toInput, toSlider);
    toInput.oninput = () => controlToInput(toSlider, fromInput, toInput, toSlider);

</script>