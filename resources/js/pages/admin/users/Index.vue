<template>
    <a-card title="User" style="width: 100%">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <a-button type="primary">
                    <router-link :to="{ name: 'admin-users-create'}">
                        <i class="fa-solid fa-plus"></i>
                    </router-link>
                </a-button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a-table :dataSource="users" :columns="columns" :scroll="{ x: 576 }">
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key === 'index'">
                            <span>{{ index + 1 }}</span>
                        </template>

                        <template v-if="column.key === 'status'">
                            <span v-if="record.status_id == 1" class="text-primary">{{ record.status}}</span>
                            <span v-else-if="record.status_id == 2" class="text-danger">{{ record.status }}</span>
                        </template>
                    </template>
                </a-table>
            </div>
        </div>
    </a-card>
</template>

<script>
import { useMenu } from '../../../stores/use-menu';
import { defineComponent, ref } from 'vue';

export default defineComponent({
    setup() {
        useMenu().onSelectedKeys("admin-users");

        const users = ref([]);

        const columns = [
            {
                title: '#',
                key: 'index',
            },
            {
                title: 'Avatar',
                dataIndex: 'avatar',
                key: 'avatar',
            },
            {
                title: 'Name',
                dataIndex: 'name',
                key: 'name',
            },
            {
                title: 'Department',
                dataIndex: 'departments',
                key: 'departments',
                responsive: ['sm']
            },
            {
                title: 'Role',
                key: 'roles',
            },
            {
                title: 'Status',
                dataIndex: 'status',
                key: 'status',
            },
            {
                title: 'Action',
                key: 'action',
                fixed: 'right',
            },
        ];

        const API_URL = 'http://127.0.0.1:8000/api/users'

        const getUsers = () => {
            axios.get(API_URL)
                .then((response) => {
                    // handle success
                    users.value = response.data;
                })
                .catch((error) => {
                    // handle error
                    console.log(error);
                })
        }

        getUsers();

        return {
            users,
            columns
        }
    }
})
</script>