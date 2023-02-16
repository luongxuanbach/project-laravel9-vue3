<template>
    <a-menu
     v-model:openKeys="openKeys"
     v-model:selectedKeys="selectedKeys"
     mode="inline"
    >
        <a-menu-item key="admin-users">
            <router-link :to="{ name: 'admin-users' }">
                <span>
                    <user-outlined  class="me-1"/> Users
                </span>
            </router-link>
        </a-menu-item>

        <a-menu-item key="admin-roles">
            <router-link :to="{ name: 'admin-roles' }">
                <span>
                    <tag-outlined  class="me-1"/> Roles
                </span>
            </router-link>
        </a-menu-item>

        <a-menu-item key="admin-settings">
            <router-link :to="{ name: 'admin-settings' }">
                <span>
                    <setting-outlined class="me-1"/> Settings
                </span>
            </router-link>
        </a-menu-item>
    </a-menu>
</template>

<script>
import { defineComponent, reactive, toRefs } from 'vue';
import { useMenu } from '../stores/use-menu.js';
import { storeToRefs } from 'pinia';
import {
    UserOutlined,
    TagOutlined,
    SettingOutlined,
} from '@ant-design/icons-vue';


export default defineComponent({
    components: {
        UserOutlined,
        TagOutlined,
        SettingOutlined
    },

    setup() {
        const store = useMenu();
        const { selectedKeys, openKeys } = store;
        return {
            ...storeToRefs(store)
        };
    },
});
</script>