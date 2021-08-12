<template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
                    <div class="py-8">
                        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                            <h2 class="text-2xl leading-tight">
                                <!--{{ __('qtt.hospitals') }}-->
                                Hospitals
                            </h2>
                            <!--<div class="text-end">
                                <form
                                    class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                                    <div class=" relative ">
                                        <input type="text" id="&quot;form-subscribe-Filter"
                                               class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                               placeholder="name"/>
                                    </div>
                                    <button
                                        class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                        type="submit">
                                        Filter
                                    </button>
                                </form>
                            </div>-->
                        </div>

                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Name
                                        </th>

                                        <!--<th scope="col"
                                            class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                        </th>-->

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="hospital in hospitals">

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ hospital.id }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap" @click="nameClicked(hospital)"
                                               v-show="!hospital.editing">
                                                {{ hospital.name }}
                                            </p>

                                            <p class="text-gray-900 whitespace-no-wrap" v-show="hospital.editing">
                                                <input type="text"
                                                       :id="'hospital-name-' + hospital.id"
                                                       :ref="'hospitalname' + hospital.id"
                                                       :value="hospital.name"
                                                       class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                                       @blur="myOnBlur(hospital)"/>
                                            </p>
                                        </td>

                                        <!--<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                                Edit
                                            </a>
                                        </td>-->

                                    </tr>

                                    </tbody>
                                </table>

                                <div
                                    class="px-5 bg-white py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                                    <div class="flex items-center">
                                        <button type="button"
                                                class="w-full p-4 border text-base rounded-l-xl text-gray-600 bg-white hover:bg-gray-100">
                                            <svg width="9" fill="currentColor" height="8" class=""
                                                 viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button type="button"
                                                class="w-full px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100 ">
                                            1
                                        </button>
                                        <button type="button"
                                                class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                                            2
                                        </button>
                                        <button type="button"
                                                class="w-full px-4 py-2 border-t border-b text-base text-gray-600 bg-white hover:bg-gray-100">
                                            3
                                        </button>
                                        <button type="button"
                                                class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                                            4
                                        </button>
                                        <button type="button"
                                                class="w-full p-4 border-t border-b border-r text-base  rounded-r-xl text-gray-600 bg-white hover:bg-gray-100">
                                            <svg width="9" fill="currentColor" height="8" class=""
                                                 viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="flex flex-row mb-1 sm:mb-0 justify-end w-full">
                            <button
                                @click="showModal=true"
                                class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                type="submit">
                                Add row
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div v-if="showModal"
         class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
         style="background: rgb(230 230 230 / 50%);" id="modal-id">
        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white "
             style="max-width: 700px;">
            <!--content-->
            <div class="px-3">
                <!--body-->
                <div class=" p-5 flex-auto justify-center">
                    <h2 class="text-xl font-bold py-4 text-center">Add new hospital</h2>
                    <!--<p class="text-sm text-gray-500 px-8">Do you really want to delete your account?
                        This process cannot be undone
                    </p>-->
                    <label for="newhospitalname">Name</label>
                    <input type="text"
                           required
                           id="newhospitalname"
                           ref="newhospitalname"
                           class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    />
                    <!--<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                              clip-rule="evenodd"/>
                    </svg>
                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h2>
                    <p class="text-sm text-gray-500 px-8">Do you really want to delete your account?
                        This process cannot be undone
                    </p>-->
                </div>
                <!--footer-->
                <div class="py-3 text-right space-x-4 md:block">
                    <button
                        @click="showModal=false"
                        class="px-5 py-2 text-base font-semibold bg-white rounded-lg shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                        type="submit">
                        Cancel
                    </button>
                    <button
                        @click="saveNew"
                        class="px-5 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                        type="submit">
                        Add row
                    </button>
                    <!--<button @click="showModal=false"
                            class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Cancel
                    </button>
                    <button @click="saveNew"
                            class="mb-2 md:mb-0 bg-purple-600 px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-purple-700">
                        Save
                    </button>-->
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import axios from 'axios';

    export default {
        name: 'Hospitals',

        data() {
            return {
                showModal: false,
                hospitals: []
            }

        },

        methods: {
            myOnBlur(selectedHospital) {
                let theHospital = this.hospitals.find(hospital => hospital.id == selectedHospital.id);

                let newName = this.$refs['hospitalname' + selectedHospital.id].value;

                axios.put('api/hospitals/' + selectedHospital.id, {
                    name: newName
                }, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(
                    (response) => {
                        theHospital.name = newName;
                        theHospital.editing = false;
                    }
                ).catch(
                    (error) => {
                        console.error(error)
                    }
                )

            },

            nameClicked(selectedHospital) {
                let theHospital = this.hospitals.find(hospital => hospital.id == selectedHospital.id);
                theHospital.editing = true;

                setTimeout(() => this.$refs['hospitalname' + selectedHospital.id].focus(), 1)
            },

            saveNew() {
                let newValue = this.$refs['newhospitalname'].value

                if (newValue == '') {
                    alert('Name can not be empty!');
                    return;
                }

                console.log(newValue)

                axios.post('api/hospitals', {
                    name: newValue
                }, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(
                    response => {
                        console.log(response)
                        this.hospitals.push({
                            id: response.data.data.id,
                            name: response.data.data.name
                        })
                        this.showModal = false
                    }
                ).catch(
                    error => {
                        console.log(error)
                    }
                )
            }

        },

        mounted() {

            axios.get('api/hospitals')
                .then(response => {
                    this.hospitals = response.data;
                })
        }
    }

</script>

<style></style>
