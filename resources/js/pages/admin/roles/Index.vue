<template>
    Day la trang quan ly roles
</template>

<script>
import { useMenu } from '../../../stores/use-menu';

export default {
    setup() {
        useMenu().onSelectedKeys("admin-roles");
    }
}
</script>