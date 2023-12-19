<script setup>
import Modal from '@/Components/Modal.vue';
import InputError from "@/Components/InputError.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm} from "@inertiajs/vue3";
import {computed, ref, watch} from "vue";

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    gradeId: {
        type: String,
        default: '',
    },
    grade: {
        type: String,
        default: '',
    },
    studentName: {
        type: String,
        default: '',
    },
    courseName: {
        type: String,
        default: '',
    },
});

const form = useForm({
    grade: '',
    gradeId: '',
});

watch(
    () => props.show,
    () => {
        if (props.show) {
            form.grade = props.grade;
            form.gradeId = props.gradeId;
        } else {
            form.grade = '';
            form.gradeId = '';
        }
    }
);

const grades = [
    {id: 'A+', name: 'A+'},
    {id: 'A', name: 'A'},
    {id: 'A-', name: 'A-'},
    {id: 'B+', name: 'B+'},
    {id: 'B', name: 'B'},
    {id: 'B-', name: 'B-'},
    {id: 'C+', name: 'C+'},
    {id: 'C', name: 'C'},
    {id: 'C-', name: 'C-'},
    {id: 'D+', name: 'D+'},
    {id: 'D', name: 'D'},
    {id: 'D-', name: 'D-'},
    {id: 'F', name: 'F'},
];

</script>

<template>
    <Modal :show="show" :max-width="'lg'" @close="show = false">
        <form @submit.prevent="form.post(route('grade.store'))">
            <div class="p-4 grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-4">
                <div class="col-span-full pt-3">
                    Edit grade for {{ props.studentName }} in {{ props.courseName }}
                </div>
                <div class="sm:col-span-2 flex">
                    <InputLabel for="course" value="Grade" class="px-4 pt-3 block text-sm font-medium leading-6 text-gray-900" />
                    <div class="mt-2">
                        <select id="grade" v-model="form.grade" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <template v-for="grade in grades">
                                <option :value="grade.id">{{ grade.name }}</option>
                            </template>
                        </select>
                    </div>
                    <InputError class="mt-2" :message="form.errors.grade" />
                </div>
                <div class="col-span-full">
                    <SecondaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" :type="'submit'">
                        Submit
                    </SecondaryButton>
                </div>
            </div>
        </form>
    </Modal>
</template>
