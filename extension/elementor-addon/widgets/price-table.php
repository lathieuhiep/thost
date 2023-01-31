<?php

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class THost_Elementor_Addon_Price_Table extends Widget_Base {

	public function get_categories(): array {
		return array( 'my-theme' );
	}

	public function get_name(): string {
		return 'thost-price-table';
	}

	public function get_title(): string {
		return esc_html__( 'Price Table', 'thost' );
	}

	public function get_icon(): string {
		return 'eicon-price-table';
	}

	protected function register_controls() {

		// Content heading
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'thost' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Price Tables', 'thost' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'title',
						'label' => esc_html__( 'Title', 'thost' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Title' , 'thost' ),
						'label_block' => true,
					],
					[
						'name' => 'text_price',
						'label' => esc_html__( 'Text Price', 'thost' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Text Price' , 'thost' ),
						'label_block' => true,
					],
					[
						'name' => 'price',
						'label' => esc_html__( 'Price', 'thost' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( '138k' , 'thost' ),
						'label_block' => true,
					],
                    [
						'name' => 'price_period',
						'label' => esc_html__( 'Price Period (per)', 'thost' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'tháng' , 'thost' ),
						'label_block' => true,
					],
					[
						'name' => 'description',
						'label' => esc_html__( 'Description', 'thost' ),
						'type' => Controls_Manager::TEXTAREA,
						'rows' => 10,
						'default' => esc_html__( 'Description' , 'thost' ),
						'show_label' => false,
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'thost' ),
						'type' => Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://your-link.com', 'thost' ),
						'options' => [ 'url', 'is_external', 'nofollow' ],
						'default' => [
							'url' => '#'
						],
						'label_block' => true,
					]
				],
				'default' => [
					[
						'title' => esc_html__( 'Title #1', 'thost' ),
						'description' => esc_html__( 'Item content. Click the edit button to change this text.', 'thost' ),
					],
					[
						'title' => esc_html__( 'Title #2', 'thost' ),
						'description' => esc_html__( 'Item content. Click the edit button to change this text.', 'thost' ),
					],
					[
						'title' => esc_html__( 'Title #3', 'thost' ),
						'description' => esc_html__( 'Item content. Click the edit button to change this text.', 'thost' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="element-price-table">
            <div class="row row-cols-3">
                <?php foreach ( $settings['list'] as $index => $item ) : ?>
                    <div class="col text-center item-<?php echo esc_attr( $item['_id'] ) ?>">
                        <div class="item__box">
                            <h4 class="title">
                                <?php echo esc_html( $item['title'] ); ?>
                            </h4>

                            <div class="info">
                                <p class="info__text">
                                    <?php echo esc_html( $item['text_price'] ); ?>
                                </p>

                                <p class="info__price">
                                    <span class="tag"><?php echo esc_html( $item['price'] ); ?></span>
                                    <span class="period"><?php echo esc_html( $item['price_period'] ); ?></span>
                                </p>
                            </div>

                            <div class="desc">
		                        <p><?php echo esc_html( $item['description'] ); ?></p>
                            </div>

                            <?php
                            if ( ! empty( $item['link']['url'] ) ) :
	                            $item_link_key = 'item_link_' . $index;
	                            $this->add_link_attributes( $item_link_key, $item['link'] );
                            ?>
                                <a class="btn-link-item" <?php echo $this->get_render_attribute_string( $item_link_key ); ?>>
                                    Xem them
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

		<?php

	}

}