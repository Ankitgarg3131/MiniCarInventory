<template>
<div>
      <div class="row">
            <div class="input-group center">
                <label>Add Manufacture</label>
                <input type="text" placeholder="Enter Manufacture Name" class="form-group" name="name">
                <button :disabled="disableSubmit" class="text-primary">{{disableSubmit?'Submitting..':'Subbmit'}}
            </div>
        </div>
        
</div>

</template>
export default{
    mounted()
    {
        console.log('vue calling');
    }
}