<template>
    <form @submit.prevent="">
        <a-card title="Edit User" style="width: 100%;">
            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mb-3">
                            <a-avatar shape="square" :size="200">
                                <template #icon>
                                    <img src="../../../assets/user.webp" alt="Avatar">
                                </template>
                            </a-avatar>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <a-button type="primary">
                                <span>
                                    <i class="fa-solid fa-plus me-2"></i>
                                    Choose image
                                </span>
                            </a-button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.status_id
                                }">
                                    Status:
                                </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select allow-clear show-search placeholder="Select a status" style="width: 100%"
                                :options="users_status" :filter-option="filterOption" v-model:value="status_id"
                                :class="{
                                    'select-danger': errors.status_id
                                }"
                            >
                            </a-select>

                            <div class="w-100"></div>

                            <small v-if="errors.status_id" class="text-danger">{{ errors.status_id[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.username
                                }">
                                    Username:
                                </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Username" allow-clear v-model:value="username" :class="{
                                    'input-danger': errors.username
                                }"/>

                            <div class="w-100"></div>

                            <small v-if="errors.username" class="text-danger">{{ errors.username[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.name
                                }">
                                    Fullname:
                                </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Fullname" allow-clear v-model:value="name" :class="{
                                    'input-danger': errors.name
                                }"/>

                            <div class="w-100"></div>

                            <small v-if="errors.name" class="text-danger">{{ errors.name[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.email
                                }">
                                    Email:
                                </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input placeholder="Email" allow-clear v-model:value="email" :class="{
                                    'input-danger': errors.email
                                }"
                            />

                            <div class="w-100"></div>

                            <small v-if="errors.email" class="text-danger">{{ errors.email[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.department_id
                                }">
                                    Department:
                                </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select allow-clear show-search placeholder="Select a department" style="width: 100%"
                                :options="departments" :filter-option="filterOption" v-model:value="department_id"
                                :class="{
                                    'select-danger': errors.department_id
                                }"
                                >
                            </a-select>

                            <div class="w-100"></div>

                            <small v-if="errors.department_id" class="text-danger">{{ errors.department_id[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-checkbox v-model:checked="change_password">
                                Change password
                            </a-checkbox>
                        </div>
                    </div>

                    <div class="row mb-3" v-if="change_password === true">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.password
                                }">
                                    Password:
                                </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-password placeholder="Password" allow-clear v-model:value="password" :class="{
                                    'input-danger': errors.password
                                }"
                            />

                            <div class="w-100"></div>

                            <small v-if="errors.password" class="text-danger">{{ errors.password[0] }}</small>
                        </div>
                    </div>

                    <div class="row mb-3" v-if="change_password === true">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span>Confirm Password:</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-password placeholder="Confirm Password" allow-clear v-model:value="password_confirmation"/>
                        </div>
                    </div>

                    <div class="row mb-3" >
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span>Last login at:</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <span>{{ login_at }}</span>
                        </div>
                    </div>

                    <div class="row mb-3" >
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span>Last changed password at:</span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <span>{{ change_password_at }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
                    <a-button class="me-0 me-sm-2 mb-3 mb-sm-0">
                        <router-link :to="{ name: 'admin-users' }">
                            <span>Cancel</span>
                        </router-link>
                    </a-button>
                    <a-button type="primary" html-type="submit">
                        <span>Save</span>
                    </a-button>
                </div>
            </div>
        </a-card>
    </form>
</template>

<script>
import { defineComponent, ref, reactive, toRefs } from 'vue'
import { useMenu } from '../../../stores/use-menu';
import { message } from 'ant-design-vue';
import { useRouter } from 'vue-router'

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys(["admin-users"]);

        const router = useRouter();
        const users_status = ref([]);
        const departments = ref([]);
        const users = reactive({
            username: "",
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            department_id: [],
            status_id: [],
            change_password: false,
            login_at: "",
            change_password_at: ""
        });

        const errors = ref({});

        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        }

        return {
            users_status,
            departments,
            filterOption,
            ...toRefs(users),
            errors
        }
    },
})
</script>
<style>
.select-danger {
    border: 1px solid red;
}

.input-danger {
    border-color: red;
}
</style>