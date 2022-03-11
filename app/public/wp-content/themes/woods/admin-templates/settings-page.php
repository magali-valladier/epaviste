<?php
/**
 * Settings page template
 */
?>
<div id="woods-settings-page">
	<div class="woods-settings-page">
		<h1 class="cs-vui-title"><?php esc_html_e( 'Woods Theme Settings', 'woods' ); ?></h1>
		<div class="cx-vui-panel">
			<cx-vui-tabs
				:in-panel="false"
				value="layout-settings"
				layout="vertical">

				<cx-vui-tabs-panel
					name="layout-settings"
					label="<?php esc_html_e( 'Layout', 'woods' ); ?>"
					key="layout-settings">

					<div class="woods-settings-page__title-wrap">
						<div class="cx-vui-subtitle"><?php esc_html_e( 'Disable Container of Content on Archive Pages', 'woods' ); ?></div>
						<div class="cx-vui-component__desc"><?php esc_html_e( 'List of CPT that will be a disabled container of content', 'woods' ); ?></div>
					</div>

					<div class="woods-settings-page__group-controls">
						<div
							class="woods-settings-page__group-control"
							v-for="(option, index) in pageOptions.disable_content_container_archive_cpt.options">
							<cx-vui-switcher
								:key="`archive_cpt-${index}`"
								:name="`disable_content_container_archive_cpt-${option.value}`"
								:label="option.label"
								:wrapper-css="[ 'equalwidth' ]"
								return-true="true"
								return-false="false"
								v-model="pageOptions.disable_content_container_archive_cpt.value[option.value]"
							>
							</cx-vui-switcher>
						</div>
					</div>

					<div class="woods-settings-page__title-wrap">
						<div class="cx-vui-subtitle"><?php esc_html_e( 'Disable Container of Content on Singular Pages', 'woods' ); ?></div>
						<div class="cx-vui-component__desc"><?php esc_html_e( 'List of CPT that will be a disabled container of content', 'woods' ); ?></div>
					</div>

					<div class="woods-settings-page__group-controls">
						<div
							class="woods-settings-page__group-control"
							v-for="(option, index) in pageOptions.disable_content_container_single_cpt.options">
							<cx-vui-switcher
								:key="`single_cpt-${index}`"
								:name="`disable_content_container_single_cpt-${option.value}`"
								:label="option.label"
								:wrapper-css="[ 'equalwidth' ]"
								return-true="true"
								return-false="false"
								v-model="pageOptions.disable_content_container_single_cpt.value[option.value]"
							>
							</cx-vui-switcher>
						</div>
					</div>

					<cx-vui-select
						name="single_post_template"
						label="<?php esc_html_e( 'Default Single Post Template', 'woods' ); ?>"
						:wrapper-css="[ 'equalwidth' ]"
						size="fullwidth"
						:options-list="pageOptions.single_post_template.options"
						v-model="pageOptions.single_post_template.value">
					</cx-vui-select>

				</cx-vui-tabs-panel>

				<cx-vui-tabs-panel
					name="available-modules"
					label="<?php esc_html_e( 'Modules', 'woods' ); ?>"
					key="available-modules">

					<div class="woods-settings-page__title-wrap">
						<div class="cx-vui-subtitle"><?php esc_html_e( 'Available Modules', 'woods' ); ?></div>
						<div class="cx-vui-component__desc"><?php esc_html_e( 'Enable/disable additional Woods features', 'woods' ); ?></div>
					</div>

					<div class="woods-settings-page__group-controls">
						<div
							class="woods-settings-page__group-control"
							v-for="(option, index) in pageOptions.available_modules.options">
							<cx-vui-switcher
								:key="`available_module-${index}`"
								:name="`available_module-${option.value}`"
								:label="option.label"
								:wrapper-css="[ 'equalwidth' ]"
								return-true="true"
								return-false="false"
								v-model="pageOptions.available_modules.value[option.value]"
							>
							</cx-vui-switcher>
						</div>
					</div>

				</cx-vui-tabs-panel>

				<cx-vui-tabs-panel
					name="misc-settings"
					label="<?php esc_html_e( 'Misc', 'woods' ); ?>"
					key="misc-settings">

					<cx-vui-switcher
						name="enable_theme_customize_options"
						label="<?php esc_html_e( 'Enable Theme Customize Options', 'woods' ); ?>"
						:wrapper-css="[ 'equalwidth' ]"
						return-true="true"
						return-false="false"
						v-model="pageOptions.enable_theme_customize_options.value"
					>
					</cx-vui-switcher>

					<cx-vui-switcher
						name="enqueue_theme_styles"
						label="<?php esc_html_e( 'Enable Theme Styles', 'woods' ); ?>"
						:wrapper-css="[ 'equalwidth' ]"
						return-true="true"
						return-false="false"
						v-model="pageOptions.enqueue_theme_styles.value"
					>
					</cx-vui-switcher>

					<cx-vui-switcher
						name="enqueue_theme_js_scripts"
						label="<?php esc_html_e( 'Enable Theme JS Scripts', 'woods' ); ?>"
						:wrapper-css="[ 'equalwidth' ]"
						return-true="true"
						return-false="false"
						v-model="pageOptions.enqueue_theme_js_scripts.value"
					>
					</cx-vui-switcher>

					<cx-vui-switcher
						name="enqueue_dynamic_css"
						label="<?php esc_html_e( 'Enable Dynamic CSS', 'woods' ); ?>"
						:wrapper-css="[ 'equalwidth' ]"
						return-true="true"
						return-false="false"
						v-model="pageOptions.enqueue_dynamic_css.value"
					>
					</cx-vui-switcher>

					<cx-vui-switcher
						name="cache_dynamic_css"
						label="<?php esc_html_e( 'Cache Dynamic CSS', 'woods' ); ?>"
						description="<?php esc_html_e( 'Cache CSS generated by your options to boost performance.', 'woods' ); ?>"
						:wrapper-css="[ 'equalwidth' ]"
						return-true="true"
						return-false="false"
						v-model="pageOptions.cache_dynamic_css.value"
						:conditions="[{compare:'equal',input:pageOptions.enqueue_dynamic_css.value,value:'true'}]"
					>
					</cx-vui-switcher>

				</cx-vui-tabs-panel>
			</cx-vui-tabs>
		</div>
	</div>
</div>
