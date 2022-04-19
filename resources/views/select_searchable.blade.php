<div x-data="{ selectedCity: '' }" x-init="
    select2 = $($refs.select).select2();
    select2.on('select2:select', (event) => {
        selectedCity = event.target.value;
    });
    $watch('selectedCity', (value) => {
        select2.val(value).trigger('change');
    });">
  <select x-ref="select" data-placeholder="Select a City">
    <option></option>
    <option value="London">London</option>
    <option value="New York">New York</option>
  </select>
  <p>Selected value (bound in Alpine.js): <code x-text="selectedCity"></code></p>
  
  <p><button @click="selectedCity = ''">Reset selectedCity</button></p>
  <p><button @click="selectedCity = 'London'">Trigger selection of London</button></p>
  <p><button @click="selectedCity = 'New York'">Trigger selection of New York</button></p>
</div>

