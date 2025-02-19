(function(wp) {
    var registerBlockType = wp.blocks.registerBlockType;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var InnerBlocks = wp.blockEditor.InnerBlocks;
    var PanelBody = wp.components.PanelBody;
    var DateTimePicker = wp.components.DateTimePicker;
    var useBlockProps = wp.blockEditor.useBlockProps;
    var __ = wp.i18n.__;

    registerBlockType('scheduled-block/block', {
        title: __('Scheduled Block'),
        category: 'widgets',
        description: __('Content visible only during specified times.'),
        icon: 'calendar',
        
        attributes: {
            startDateTime: { type: 'string' },
            endDateTime: { type: 'string' }
        },

        edit: function(props) {
            var attributes = props.attributes;
            var blockProps = useBlockProps();

            function createDateTimePicker(label, date, onChange) {
                return wp.element.createElement(
                    'div',
                    { className: 'schedule-control' },
                    wp.element.createElement('label', null, label),
                    wp.element.createElement(DateTimePicker, {
                        currentDate: date,
                        onChange: onChange,
                        is12Hour: true
                    })
                );
            }

            return wp.element.createElement(
                'div',
                blockProps,
                [
                    wp.element.createElement(
                        InspectorControls,
                        { key: 'inspector' },
                        wp.element.createElement(
                            PanelBody,
                            { 
                                title: __('Schedule Settings'),
                                initialOpen: true,
                                className: 'schedule-panel'
                            },
                            [
                                createDateTimePicker(
                                    __('Start Date/Time'),
                                    attributes.startDateTime,
                                    function(date) { props.setAttributes({ startDateTime: date }) }
                                ),
                                createDateTimePicker(
                                    __('End Date/Time'),
                                    attributes.endDateTime,
                                    function(date) { props.setAttributes({ endDateTime: date }) }
                                )
                            ]
                        )
                    ),
                    wp.element.createElement(
                        'div',
                        { className: 'schedule-block-content' },
                        wp.element.createElement(
                            InnerBlocks,
                            { key: 'content' }
                        )
                    )
                ]
            );
        },

        save: function() {
            return wp.element.createElement(
                InnerBlocks.Content,
                null
            );
        }
    });
})(window.wp);