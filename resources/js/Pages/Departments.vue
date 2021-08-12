<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ resource_name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
                        <div class="py-8">
                            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                                <h2 class="text-2xl leading-tight">
                                    {{ resource_name }}
                                </h2>
                            </div>

                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                        <tr>
                                            <th v-for="item_field in item_fields"
                                                scope="col"
                                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                {{ item_field }}
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="item in resource_items.data">

                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ item.id }}
                                                </p>
                                            </td>

                                            <template v-for="item_field in item_fields">
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" v-if="item_field !== 'id'">
                                                    <p class="text-gray-900 whitespace-no-wrap" @click="fieldClicked(item, item_field)"
                                                       v-show="!item.editing || !item.editing[item_field]">
                                                        {{ item[item_field] }}
                                                    </p>

                                                    <p class="text-gray-900 whitespace-no-wrap" v-show="item.editing && item.editing[item_field]">
                                                        <input type="text"
                                                               :id="resource_object + '-' + item_field + '-' + item.id"
                                                               :ref="resource_object + item_field + item.id"
                                                               :value="item[item_field]"
                                                               class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                                               @blur="myOnBlur(item, item_field)"/>
                                                    </p>
                                                </td>
                                            </template>
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
                        <h2 class="text-xl font-bold py-4 text-center">Add new {{ resource_object }}</h2>

                        <template v-for="item_field in item_fields" >
                            <div class="col-span-6 sm:col-span-4" v-if="item_field !== 'id'">

                                <label :for="'new' + item_field">{{ item_field }}</label>
                                <input type="text"
                                       required
                                       :id="'new' + item_field"
                                       :ref="'new' + item_field"
                                       class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                />
                            </div>
                        </template>

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
                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import JetInput from "@/Jetstream/Input";
    import JetInputError from "@/Jetstream/InputError";
    import JetLabel from "@/Jetstream/Label";

    export default {
        components: {
            AppLayout,
            Welcome,
            JetInput,
            JetInputError,
            JetLabel,
        },

        props: {
            resource_items: Object,
            item_fields: Object,
            resource_name: String,
            resource_object: String,
        },

        data() {
            return {
                showModal: false,
            }

        },

        methods: {
            myOnBlur(selectedObject, field) {
                let theObject = this.resource_items.data.find(item => item.id == selectedObject.id);

                let newValue = this.$refs[this.resource_object + field + selectedObject.id].value;

                theObject[field] = newValue
                console.log(theObject)

                axios.put('api/' + this.resource_object + 's/' + selectedObject.id, theObject, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(
                    (response) => {
                        theObject[field] = newValue;
                        theObject.editing[field] = false;
                    }
                ).catch(
                    (error) => {
                        console.error(error)
                    }
                )

            },

            fieldClicked(selectedObject, field) {
                console.log(this.resource_items.data)
                let theItem = this.resource_items.data.find(item => item.id == selectedObject.id);
                console.log(theItem)
                theItem.editing = [];
                theItem.editing[field] = true;

                setTimeout(() => this.$refs[this.resource_object + field + selectedObject.id].focus(), 1)
            },

            saveNew() {
                let newObject = {}
                this.item_fields.forEach(field => {
                    if (field !== 'id') {
                        newObject[field] = this.$refs['new' + field].value
                    }

                })
                axios.post('api/' + this.resource_object + 's', newObject, {
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(
                    response => {
                        console.log(response)
                        this.resource_items.data.push(response.data.data[0])
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

            console.log(this.resource_items.data)

            /*axios.get('api/departments')
                .then(response => {
                    this.departments = response.data;
                })*/
        }
    }
</script>
