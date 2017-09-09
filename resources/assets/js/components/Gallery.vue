<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Upload</strong></div>

                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <input type="file" class="form-control" @change="imageChanged">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                image: ''
            }
        },
        methods: {
            imageChanged(e) {
                console.log(e.target)
            }
        }
    }
</script>

<style>

</style>