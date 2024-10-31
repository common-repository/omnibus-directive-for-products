<div class="woomnibus-box">
    <style scoped>
        p {
            display: block;
        }
        .woomnibus-option input {
            width: 150px!important;
            display: block;
        }
        .woomnibus-options {
            display: flex;
            flex-direction: column;
        }
        .woomnibus-option {
            display: block;
        }
        .woomnibus-option label {
            width: 60px;
            display: block;
            margin: 0 20px 20px 20px;
        }
    </style>
    <p>
        <?php echo __('Omnibus - lowest price since 30 days.', 'zkd');?>
    </p>
    <div class="woomnibus-options">
        <div class="woomnibus-option">
            <label for="price">Price</label>
            <input id="price" type="text" name="price"
                   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'price', true ) ); ?>">
        </div>
        <div class="woomnibus-option">
            <label for="date">Date</label>
            <input id="date" type="date" name="date"
                   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'date', true ) ); ?>">
        </div>
    </div>
</div>