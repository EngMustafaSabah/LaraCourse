<template>
  <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form form @submit.prevent="submit">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                  <input type="text" v-model="form.name" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="relative inline-flex">
                  <label for="active" class="block text-sm font-medium text-gray-700">active</label>
                  <select v-model="form.active" name="active" id="active" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="1" selected>Active</option>
                    <option value="0">Disactive</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- <h1 v-for="(Categor,index) in Category " :key="index"> {{Categor.name}} </h1> -->

</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
  // props: 'Category',
  setup () {
    const form = reactive({
      name: null,
      active: null,
    })

    function submit() {
      Inertia.post('/postcategory', form)
    }

    return { form, submit }
  },
}
</script>