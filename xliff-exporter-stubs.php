<?php

/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Content_Parsing_Rules_Block
 *
 * @since 3.2
 *
 * Holds the rules defining which part of a block should be "translated" (see below).
 * Translated may mean different actions, like exporting it into a translation file, or updating the database...
 */
class PLL_Translation_Parsing_Rules_Block
{
    /**
     * Holds the rules as Xpath expression to evaluate in the blocks content.
     * By default, holds rules for the WordPress core blocks.
     *
     * @var array $rules
     */
    private $rules = array('core/paragraph' => array('//p'), 'core/heading' => array('//*[self::h1 or self::h2 or self::h3 or self::h4 or self::h5 or self::h6]'), 'core/buttons' => array(), 'core/button' => array('//a'), 'core/image' => array('//figure/figcaption', '//figure/img/@alt'), 'core/gallery' => array('//figure/figcaption', '//figure/img/@alt'), 'core/media-text' => array('//figure/img/@alt'), 'core/list' => array('//ul/li|//ol/li'), 'core/quote' => array('//blockquote/p', '//blockquote/cite'), 'core/audio' => array('//figure/figcaption'), 'core/video' => array('//figure/figcaption'), 'core/file' => array('//div/a'), 'core/cover' => array('//div/p'), 'core/subhead' => array('//p'), 'core/verse' => array('//pre'), 'core/table' => array('//th', '//td', '//figure/figcaption'), 'core/preformatted' => array('//pre'), 'core/pullquote' => array('//blockquote/p', '//blockquote/cite'), 'core/text-columns' => array('//div[@class="wp-block-column"]'), 'core/embed' => array('//figure/figcaption'), 'core-embed/twitter' => array('//figure/figcaption'), 'core-embed/youtube' => array('//figure/figcaption'), 'core-embed/facebook' => array('//figure/figcaption'), 'core-embed/instagram' => array('//figure/figcaption'), 'core-embed/vimeo' => array('//figure/figcaption'), 'core-embed/soundcloud' => array('//figure/figcaption'), 'core-embed/spotify' => array('//figure/figcaption'), 'core-embed/flickr' => array('//figure/figcaption'), 'core-embed/animoto' => array('//figure/figcaption'), 'core-embed/collegehumor' => array('//figure/figcaption'), 'core-embed/dailymotion' => array('//figure/figcaption'), 'core-embed/funnyordie' => array('//figure/figcaption'), 'core-embed/hulu' => array('//figure/figcaption'), 'core-embed/imgur' => array('//figure/figcaption'), 'core-embed/issuu' => array('//figure/figcaption'), 'core-embed/kickstarter' => array('//figure/figcaption'), 'core-embed/meetup-com' => array('//figure/figcaption'), 'core-embed/mixcloud' => array('//figure/figcaption'), 'core-embed/photobucket' => array('//figure/figcaption'), 'core-embed/photobucket' => array('//figure/figcaption'), 'core-embed/polldaddy' => array('//figure/figcaption'), 'core-embed/reddit' => array('//figure/figcaption'), 'core-embed/reverbnation' => array('//figure/figcaption'), 'core-embed/screencast' => array('//figure/figcaption'), 'core-embed/scribd' => array('//figure/figcaption'), 'core-embed/slideshare' => array('//figure/figcaption'), 'core-embed/smugmug' => array('//figure/figcaption'), 'core-embed/speaker' => array('//figure/figcaption'), 'core-embed/ted' => array('//figure/figcaption'), 'core-embed/tumblr' => array('//figure/figcaption'), 'core-embed/videopress' => array('//figure/figcaption'), 'core-embed/wordpress' => array('//figure/figcaption'), 'core-embed/wordpress-tv' => array('//figure/figcaption'));
    /**
     * Holds the name of the block type being currently parsed.
     *
     * @var string $block_type Similar to {@see WP_Block_Parser_Block::$blockName}.
     */
    private $block_type;
    /**
     * Only keeps the rules matching a certain block type.
     *
     * @since 3.2
     *
     * @param string $block_type {@see WP_Block_Parser_Block::$blockName}.
     * @return PLL_Translation_Parsing_Rules_Block $this This object with its $rules property updated.
     */
    public function filter($block_type)
    {
    }
    /**
     * Extracts translatable parts from the block content.
     * Returns the exact same block content if if the parsing rule is set to false.
     *
     * @since 3.2
     *
     * @uses DOMXPath
     * @param string $content {@see WP_Block_Parser_Block::$innerContent}.
     * @return string[]
     */
    public function parse($content)
    {
    }
    /**
     * Define if a block should be parsed as custom HTML.
     *
     * @since 3.2
     *
     * @param array $block An array mimicking a {@see WP_Block_Parser_Block}.
     * @return bool
     */
    public function should_parse_as_html($block)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Walker_Interface
 *
 * Define interface for classes that iterate over content. Also serve as a factory for those classes.
 *
 * @since 3.2
 */
interface PLL_Translation_Walker_Interface
{
    /**
     * Iterates over each translatable part of a content and applies a callback function on each part.
     *
     * @since 3.2
     *
     * @param callable $callback A callback function.
     * @return string The content (potentially) modified by the callback.
     */
    public function walk($callback);
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Walker_Classic
 *
 * @since 3.2
 *
 * Iterates over a HTML formatted string and applies transformations on level 1 HTML tags.
 */
class PLL_Translation_Walker_Classic implements \PLL_Translation_Walker_Interface
{
    /**
     * Original content.
     *
     * @var string
     */
    private $content;
    /**
     * Whether the given content belongs to a media.
     *
     * @var bool
     */
    private $is_media_content;
    /**
     * Original content parsed as a DOM tree.
     *
     * @var PLL_DOM_Document
     */
    private $document;
    /**
     * Callback to execute on each translatable content part.
     *
     * @var callable
     */
    private $callback;
    /**
     * PLL_Content_Walker_Classic constructor.
     *
     * @since 3.2
     *
     * @param string $content Classic editor HTML content.
     * @param bool   $is_media_content Whether or not the walker is used for media content.
     */
    public function __construct($content, $is_media_content = \false)
    {
    }
    /**
     * Iterate over translatable parts of a content, applies the defined callback on each such part, and then returns a transformed content.
     *
     * @since 3.2
     *
     * @param callable $callback A transformation to apply to each translatable content part.
     * @return string
     */
    public function walk($callback)
    {
    }
    /**
     * Parse a HTML document node and apply a callback onto translatable values.
     *
     * @since 3.2
     *
     * @param DOMNode $node A first level HTML node.
     * @return string The content after having applied the callback onto it.
     */
    private function apply($node)
    {
    }
    /**
     * Generate a string of all atributes to be inserted as an attributes list in a HTML tag.
     *
     * @since 3.2
     *
     * @param DOMElement                       $node  The current node.
     * @param PLL_Translation_Entry_Identified $entry A translation entry parsed from a translation document.
     *
     * @return string
     */
    protected function make_html_tag_attributes($node, $entry)
    {
    }
    /**
     * Handles nodes containing images for compose the returned content.
     *
     * @since 3.2
     *
     * @param DOMElement $node Node containing images.
     *
     * @return mixed|string
     */
    private function handle_image($node)
    {
    }
    /**
     * Creates a HTML tag from a Translation_Entry and a PHP DOMNode.
     *
     * @since 3.2
     *
     * @param DOMNode                          $node A DOM node parsed from a HTML formatted database content.
     * @param PLL_Translation_Entry_Identified $entry A translation entry parsed from a translation document.
     * @return string A HTML formatted string.
     */
    private function make_html_tag_from($node, $entry)
    {
    }
    /**
     * Check if the entry translation exists and return it, otherwise return the source text.
     *
     * @since 3.2
     *
     * @param PLL_Translation_Entry_Identified $entry A translation entry parsed from a translation document.
     * @return string The translated string.
     */
    private function maybe_translate_entry($entry)
    {
    }
    /**
     * Create an entry from a given node and apply a callback function to it.
     *
     * @since 3.2
     *
     * @param DOMNode $node A DOM node parsed from a HTML formatted database content.
     * @param string  $singular The text of the source.
     * @return bool|Translation_Entry The translated entry or false/true depending on the callback.
     */
    private function create_entry_and_apply_callback($node, $singular)
    {
    }
    /**
     * Handles node containing the last part of a media shortcode and maybe translate it.
     *
     * @since 3.2
     *
     * @param DOMNode $node The current node corresponding to the string.
     * @param string  $shortcoded_string The string to check.
     * @return string The original string if not translated.
     */
    public function handle_media_shortcode($node, $shortcoded_string)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Walker_Factory
 *
 * A factory to create a translation walker with a given content.
 *
 * @since 3.2
 */
class PLL_Translation_Walker_Factory
{
    /**
     * Generates the correct walker class for the content to be walked.
     *
     * Copies condition from {@see has_blocks()} because we don't need to hit the database to get a content we already has.
     *
     * @since 3.2
     *
     * @param string $content          A content to iterate over.
     * @param bool   $is_media_content Whether or not the walker concerns a media content.
     * @return PLL_Translation_Walker_Interface
     */
    public static function create_from($content, $is_media_content = \false)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Manages posts translations.
 *
 * @since 3.2
 */
class PLL_Translation_Post_Model
{
    /**
     * @var PLL_Translation_Content
     */
    private $translate_content;
    /**
     * Used to query languages and translations.
     *
     * @var PLL_Model
     */
    private $model;
    /**
     * Constructor.
     *
     * @since 3.2
     *
     * @param PLL_Model $model Used to query languages and translations.
     */
    public function __construct($model)
    {
    }
    /**
     * Translates a post in a given language.
     *
     * @since 3.2
     *
     * @param  array        $entry    {@see PLL_Xliff_Export::get_next_entry()} output.
     * @param  PLL_Language $language A language to translate into.
     * @return void
     */
    public function translate_post($entry, $language)
    {
    }
    /**
     * Creates a new post translation.
     *
     * @since 3.2
     *
     * @param  int    $from_id     The post source id.
     * @param  string $lang        The language slug of the translated post.
     * @param  array  $data_import Import options. {
     *     string $post_status The post status of the imported posts.
     * }
     * @return int|WP_Error    The translated post id.
     */
    protected function create_post_translation($from_id, $lang, $data_import)
    {
    }
    /**
     * Save the translations group.
     *
     * @since 3.2
     *
     * @param  int    $from_id The post source id.
     * @param  int    $tr_id   The translated post id.
     * @param  string $lang    The language slug of the translated post.
     * @return void
     */
    protected function save_translations_group($from_id, $tr_id, $lang)
    {
    }
    /**
     * Update an existing post translation
     *
     * @since 3.2
     *
     * @param  int $from_id The post source id.
     * @param  int $tr_id   The translated post id.
     * @return void
     */
    protected function update_post_translation($from_id, $tr_id)
    {
    }
    /**
     * Get the translated post data.
     *
     * @since 3.2
     *
     * @param WP_Post $from_post Source post.
     * @return array Translated post data {
     *     string $post_title   The translated post title.
     *     string $post_excerpt The translated post excerpt.
     *     string $post_content The translated post content.
     * }
     */
    protected function get_post_translated_data($from_post)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Content_Walker_Blocks
 *
 * @since 3.2
 *
 * Walk a block composed content to apply a translation callback on every translatable parts.
 */
class PLL_Translation_Walker_Blocks implements \PLL_Translation_Walker_Interface
{
    /**
     * Content to be iterated upon.
     *
     * @var string
     */
    private $content;
    /**
     * Holds the blocks parsed by the WP_Block_Parser.
     *
     * @var array
     */
    private $blocks;
    /**
     * A reference to the block parsing rules.
     *
     * @var PLL_Translation_Parsing_Rules_Block
     */
    private $parsing_rules;
    /**
     * Holds the callback to be applied on each block, including the nested blocks.
     *
     * @var callable
     */
    private $callback;
    /**
     * PLL_Content_Walker_Blocks constructor.
     *
     * @since 3.2
     *
     * @param string $content An original (post?) content.
     */
    public function __construct($content)
    {
    }
    /**
     * Walk through the blocks and nested blocks to apply a callback on every one of them.
     *
     * @since 3.2
     *
     * @param callable $callback A callable to be applied on each block.
     *
     * @return string The walked content, eventually transformed by the callback.
     */
    public function walk($callback)
    {
    }
    /**
     * Recursively apply the callback provided to the {@see PLL_Translation_Walker_Blocks::walk()} method on a block.
     * Search for translatable strings matching rules defined by {@see PLL_Translation_Rules_Block} and passes those to the callback function.
     * Delegates to {@see PLL_Translation_Walker_Classic} when not parsing rule match the current block being parsed.
     *
     * @since 3.2
     *
     * @param array $block An associative array mimicking a WP_Block_Parser_Block object.
     *
     * @return array An array mimicking a WP_Block_Parser_Block object.
     */
    private function apply($block)
    {
    }
    /**
     * Replace the content inside a block with the translated content.
     *
     * @since 3.2
     *
     * @param array  $block An array mimicking a WP_Block_Parser_Block {@link https://github.com/WordPress/wordpress-develop/blob/98bee9bf081e2c43c8908002d75870c3dfd61b19/src/wp-includes/class-wp-block-parser.php#L15}
     * @param int    $i Numeric index of the inner block content to replace.
     * @param string $source_string String or sub-string to replace in the inner block content.
     * @param string $translated_string String or sub-string replacement in the inner block content.
     *
     * @return array An array mimicking a WP_Block_Parser_Block
     */
    private function replace_in_block_inner_content($block, $i, $source_string, $translated_string)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translations_Identified
 *
 * Decorates a Translations object, and allow to add and translate entries given a unique ID.
 */
class PLL_Translation_Translations_Identified
{
    /**
     * Reference to a Translations instance, holding Translations entries.
     *
     * @var Translations $translations
     */
    private $translations;
    /**
     * PLL_Import_Translations_Identified constructor.
     *
     * @param Translations $translations a Translations instance to decorate. If null, a new {@see Translations} will be generated instead.
     */
    public function __construct($translations = \null)
    {
    }
    /**
     * Delegates method calls to the inner Translations instance.
     *
     * @param string $name Name of the called method.
     * @param array  $args Arguments to pass to the called method.
     * @return mixed
     */
    public function __call($name, $args)
    {
    }
    /**
     * Triggers identification then add entry to its decorated Translations instance.
     *
     * @see PLL_Translation_Translations_Identified::maybe_identify_and_process()
     *
     * @param array|Translation_Entry $entry The translation entry to add. May have an id defined, but it is not mandatory.
     * @return array|PLL_Translation_Entry_Identified
     */
    public function add_entry($entry)
    {
    }
    /**
     * Triggers identification then delegates to its decorated Translations instance what to do with this entry.
     *
     * @see PLL_Translation_Translations_Identified::maybe_identify_and_process()
     *
     * @param array|Translation_Entry $entry The translation entry to add or merge. May have an id defined, but it is not mandatory.
     * @return array|PLL_Translation_Entry_Identified
     */
    public function add_entry_or_merge($entry)
    {
    }
    /**
     * Allow to access the decorated Translations properties.
     *
     * @param string $name Name of the property to access.
     *
     * @return mixed
     */
    public function __get($name)
    {
    }
    /**
     * Sets the identifier for an entry.
     *
     * @param array|Translation_Entry $entry An entry to set an identifier to, or an array to create such entry.
     * @param callable                $callback A function to process on every callback.
     *
     * @return bool|PLL_Translation_Entry_Identified
     */
    private function maybe_identify_and_process($entry, $callback)
    {
    }
    /**
     * Define the id number to give to the next entry that needs one.
     *
     * @since 2.9
     * @return int
     */
    private function next_entry_id()
    {
    }
    /**
     * Getter
     *
     * @return Translations|null The decorated Translations instance.
     */
    public function get_translation()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Entry_Identified
 *
 * Use Decorator Pattern around a Translation_Entry to change the way it is identified, by giving an 'id' property.
 */
class PLL_Translation_Entry_Identified
{
    /**
     * Uniquely identifies the translation, whether its string has changed or not.
     *
     * @var int|string $id
     */
    private $id;
    /**
     * A translation entry to decorate
     *
     * @var Translation_Entry $entry
     */
    public $entry;
    /**
     * PLL_Translation_Entry_Identified.
     *
     * @param Translation_Entry|array $entry A translation entry to decorate, or an array mimicking a Translation_Entry object. Default: empty array.
     */
    public function __construct($entry = array())
    {
    }
    /**
     * Verify if this property is set in the decorated instance.
     *
     * @param string $name Name of the decorated instance's property to verify.
     *
     * @return bool
     */
    public function __isset($name)
    {
    }
    /**
     * Allow to access the decorated entry properties.
     *
     * @param string $name Name of the decorated instance's property to access.
     *
     * @return mixed
     */
    public function __get($name)
    {
    }
    /**
     * Delegates call to the decorated entry.
     *
     * @param string $name Name of the method to call.
     * @param array  $args Arguments to pass to the decorated method.
     *
     * @return mixed
     */
    public function __call($name, $args = array())
    {
    }
    /**
     * Returns a unique string to identify this entry.
     *
     * @return string
     */
    public function key()
    {
    }
    /**
     * Setter
     *
     * @param string|int $id A unique identifier to retrieve this entry.
     */
    public function set_id($id)
    {
    }
    /**
     * Getter
     *
     * @return int
     */
    public function get_id()
    {
    }
}
/**
 * @package polylang-pro
 */
/**
 * Translate post taxonomies from a set of translation entries.
 */
class PLL_Translation_Term
{
    /**
     * Translations set where to look for the post metas translations.
     *
     * @var Translations
     */
    private $translations;
    /**
     * Used to manage languages and translations.
     *
     * @var PLL_Model
     */
    private $model;
    /**
     * PLL_Translation_Term constructor.
     *
     * @param PLL_Model $model PLL model.
     */
    public function __construct($model)
    {
    }
    /**
     * Setter for translations set
     *
     * @param  Translations $translations A set of translations to search the metas translations in.
     */
    public function set_translations($translations)
    {
    }
    /**
     * Translate a term.
     *
     * @param array        $entry Array of an entry properties.
     * @param PLL_Language $language The target language.
     * @return void
     */
    public function translate_term($entry, $language)
    {
    }
    /**
     * Get the translated term name if exists, the source name otherwise.
     *
     * @param WP_Term $source_term The source term object.
     * @return string The translated name.
     */
    private function get_translated_term_name($source_term)
    {
    }
    /**
     * Get the translated term description if exists, the source description otherwise.
     *
     * @param WP_Term $source_term The source term object.
     * @return string The translated description.
     */
    private function get_translated_term_description($source_term)
    {
    }
    /**
     * Translate a given entry, return the source string if no translation found.
     *
     * @param PLL_Translation_Entry_Identified $entry The entry to translate.
     * @return string The translated string from the entry.
     */
    private function maybe_translate_term_entry($entry)
    {
    }
}
/**
 * @package polylang-pro
 */
/**
 * Class PLL_Translation_Post_Metas
 *
 * Translate post metas from a set of translation entries.
 */
class PLL_Translation_Post_Metas
{
    /**
     * Translations set where to look for the post metas translations.
     *
     * @var Translations
     */
    private $translations;
    /**
     * Meta key for attachment metadatas.
     *
     * @var string
     */
    const ATTACHMENT_METADATA = '_wp_attachment_metadata';
    /**
     * Meta key for the attached files.
     *
     * @var string
     */
    const ATTACHED_FILE = '_wp_attached_file';
    /**
     * Meta key for image alternative texts.
     *
     * @var string
     */
    const ATTACHMENT_IMAGE_ALT = '_wp_attachment_image_alt';
    /**
     * Metas that are untranslatable.
     *
     * @var array
     */
    private $untranslatable_metas = array(self::ATTACHMENT_METADATA, self::ATTACHED_FILE);
    /**
     * Metas that should remain unique.
     *
     * @var array
     */
    private $unique_metas = array(self::ATTACHMENT_METADATA, self::ATTACHED_FILE, self::ATTACHMENT_IMAGE_ALT);
    /**
     * Initialize the class by creating the needed hooks.
     */
    public function init()
    {
    }
    /**
     * Setter for translations set
     *
     * @param  Translations $translations A set of translations to search the metas translations in.
     */
    public function set_translations($translations)
    {
    }
    /**
     * Look for translation of a meta value.
     *
     * @param mixed  $value A value to translate. Can only be translated if it is an unserialized string.
     * @param string $key Key of the meta to translate.
     * @return mixed
     */
    public function maybe_translate_value($value, $key)
    {
    }
    /**
     * Hack to prevent duplicating post metas.
     *
     * TODO : Spot what causes the duplicated metas and get rid of this filter
     *
     * @param bool   $check      To allow adding meta, unused.
     * @param int    $object_id  The ID of the object.
     * @param string $meta_key   The added meta key.
     * @return bool
     */
    public function add_meta($check, $object_id, $meta_key)
    {
    }
}
/**
 * Class PLL_Translation_Content
 *
 * @package polylang-pro
 */
/**
 * Translates content.
 *
 * @since 3.2
 */
class PLL_Translation_Content
{
    /**
     * The translations used to transform the content.
     *
     * @since 3.2
     *
     * @var Translations
     */
    private $translations;
    /**
     * Setter
     *
     * @since 3.2
     *
     * @param  Translations $translations Used to translate the content.
     * @return void
     */
    public function set_translations($translations)
    {
    }
    /**
     * Translates the original's post title.
     *
     * @since 3.2
     *
     * @param string $from_post post_content field of the original WP_Post.
     * @return string
     */
    public function translate_title($from_post)
    {
    }
    /**
     * Uses a {@see PLL_Translation_Walker_Interface} subclass to iterate over each translatable part of the passed content, and applies a transformation callback to it. Then returns the transformed content.
     *
     * @since 3.2
     *
     * @param string $content          The post_content field of the original WP_Post.
     * @param bool   $is_media_content Whether or not the given content comes from a media.
     * @return string
     */
    public function translate_content($content, $is_media_content = \false)
    {
    }
    /**
     * Translates the original post's excerpt.
     *
     * @since 3.2
     *
     * @param string $post_excerpt post_excerpt field of the original WP_Post.
     * @return string
     */
    public function translate_excerpt($post_excerpt)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Export_Post
 *
 * @since 3.2
 */
class PLL_Export_Post
{
    /**
     * Allows to add post metas to export file.
     *
     * @var PLL_Export_Post_Metas
     */
    protected $post_meta;
    /**
     * A reference to the current PLL_Model.
     *
     * @var PLL_Model
     */
    protected $model;
    /**
     * PLL_Export_Post constructor.
     *
     * @since 3.2
     *
     * @param PLL_Model $model A reference to the current PLL_Model.
     */
    public function __construct($model)
    {
    }
    /**
     * Yield all the piece of information required for the translation
     * and add them to the export file.
     *
     * @since 3.2
     *
     * @param PLL_Export_Multi_Files $export Represent export file.
     * @param int                    $post_id Post id.
     * @param string                 $target_language Targeted languages.
     *
     * @throws Exception Exception.
     *
     * @return PLL_Export_Multi_Files The given export file with added data.
     */
    public function export($export, $post_id, $target_language)
    {
    }
    /**
     * Updates a post.
     *
     * @since 3.2
     *
     * @param array $post Post values to update (must contain an ID (int)).
     */
    public function update_post_with_translations_ids($post)
    {
    }
    /**
     * Prevent our translations ids to be sanitized.
     *
     * @since 3.2
     *
     * @param array $allowedhtml With tag names as keys, and an array of allowed attributes as value.
     * @return array
     */
    public function allow_pll_id_in_attributes($allowedhtml)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 *
 * Class that send the taxonomies that will be exported.
 *
 * @since 3.2
 */
class PLL_Export_Terms
{
    /**
     * Used to query languages and translations.
     *
     * @var PLL_Model
     */
    private $model;
    /**
     * Term Metas
     *
     * @var PLL_Export_Term_Metas
     */
    private $term_metas;
    /**
     * Constructor.
     *
     * @since 3.2
     *
     * @param PLL_Model $model Needed to access the translated taxonomies list.
     */
    public function __construct($model)
    {
    }
    /**
     *
     * Export post taxonomies.
     *
     * @since 3.2
     *
     * @param PLL_Export_Multi_Files $export          Represent export file.
     * @param int[]                  $post_ids        Post ids.
     * @param PLL_Language           $target_language Language of the translated post.
     *
     * @return PLL_Export_Multi_Files
     */
    public function export($export, $post_ids, $target_language)
    {
    }
}
/**
 * Export actions class file
 *
 * @package exportActions
 */
/**
 * A class that handles export actions
 *
 * @file
 *
 * @since 3.2
 */
class PLL_Export_Bulk_Option extends \PLL_Bulk_Translate_Option
{
    /**
     * Represents the current file or multiple files to export.
     *
     * @var PLL_Export_File_Interface
     */
    protected $export;
    /**
     * Allows to add post data to exported file.
     *
     * @var PLL_Export_Post
     */
    protected $post;
    /**
     * Allows to add term data to exported file.
     *
     * @var PLL_Export_Terms
     */
    protected $term;
    /**
     * Service allowing to collect all ids of medias linked to or included in a given post.
     *
     * @var PLL_Collect_Medias
     */
    protected $collect_media;
    /**
     * PLL_Export_Bulk_Option constructor.
     *
     * @since 3.2
     *
     * @param PLL_Model $model Used to query languages and post translations.
     */
    public function __construct($model)
    {
    }
    /**
     * Defines wether the export Bulk Translate option is available given the admin panel and user logged.
     *
     * @since 3.2
     *
     * @return bool
     */
    public function is_available()
    {
    }
    /**
     *
     * Export post content for converter.
     *
     * @since 3.2
     *
     * @param int[]    $post_ids         The ids of the posts selected for export.
     * @param string[] $target_languages The target languages.
     *
     * @throws Exception Exception.
     */
    public function do_bulk_action($post_ids, $target_languages)
    {
    }
    /**
     * Exports the posts with their related items and create
     * the files before redirecting.
     *
     * @since 3.2
     *
     * @param PLL_Export_Download_Zip $downloader       Handles the creation of a zip file containing the export.
     * @param in[]                    $post_ids         The ids of the posts selected for export.
     * @param string[]                $target_languages The target languages.
     * @return void
     */
    protected function export($downloader, $post_ids, $target_languages)
    {
    }
    /**
     * Get post data from id
     *
     * @since 3.2
     *
     * @param int    $post_id         The ID of the post to export.
     * @param string $target_language Targeted languages.
     *
     * @throws Exception Exception.
     */
    public function translate($post_id, $target_language)
    {
    }
    /**
     * Sort posts ids to avoid exporting several posts of the same
     * translation group for each given target languages.
     *
     * @since 3.2
     *
     * @param int[]    $post_ids         An array of posts IDs to translate.
     * @param string[] $target_languages The target languages slugs for translation.
     *
     * @return int[] An array of posts ID to translate with target languages slugs as key.
     */
    public function get_sorted_posts_to_export_by_language($post_ids, $target_languages)
    {
    }
    /**
     * Remove extra posts from the same translation group respecting
     * the languages registering order from the user.
     *
     * @param int[] $post_ids An array of posts ids to export.
     *
     * @return int[] The sorted array.
     */
    protected function keep_one_post_per_translation_group($post_ids)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Abstract class to manage the export of metas.
 *
 * @since 3.2
 */
abstract class PLL_Export_Metas
{
    /**
     * Meta type. Typically 'post' or 'term' and must be filled by the child class.
     *
     * @var string
     */
    protected $meta_type;
    /**
     * Import/Export meta type. {@see PLL_Import_Export::POST_META} or {@see PLL_Import_Export::POST_META} and must be filled by the child class.
     *
     * @var string
     */
    protected $import_export_meta_type;
    /**
     * Get the meta names to export.
     *
     * @since 3.2
     *
     * @return string[] List of custom fields names.
     */
    protected function get_meta_names_to_export()
    {
    }
    /**
     * Export metas translations.
     *
     * @since 3.2
     *
     * @param PLL_Export_Multi_Files $export Represent export file.
     * @param int                    $from   Id of the source object.
     * @param int                    $to     Id of the target object.
     * @return PLL_Export_Multi_Files Export file with corresponding metas added.
     */
    public function export($export, $from, $to = 0)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Export_Post_Meta
 *
 * @since 3.2
 */
class PLL_Export_Post_Metas extends \PLL_Export_Metas
{
    /**
     * Constructor.
     *
     * @since 3.2
     */
    public function __construct()
    {
    }
    /**
     * Get the meta names to export.
     *
     * @since 3.2
     *
     * @return string[] List of custom fields names.
     */
    protected function get_meta_names_to_export()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Export_Term_Metas
 *
 * @since 3.2
 */
class PLL_Export_Term_Metas extends \PLL_Export_Metas
{
    /**
     * Constructor.
     *
     * @since 3.2
     */
    public function __construct()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Service to collect media ids.
 *
 * @since 3.2
 */
class PLL_Collect_Medias
{
    /**
     * Retrieve all the media ids linked to a set of posts.
     *
     * @since 3.2
     *
     * @param int[] $post_ids An array of post ids.
     *
     * @return int[] An array of media ids.
     */
    public function get_media_ids($post_ids)
    {
    }
    /**
     * Retrieve the media ids from a post, wether it's classic or block edited.
     *
     * @since 3.2
     *
     * @param WP_Post $post A given WP_Post object.
     * @return int[] An array of media ids.
     */
    protected function get_media_ids_for_post($post)
    {
    }
    /**
     * Get the media ids from block type content.
     *
     * @since 3.2
     *
     * @param string $post_content The content of the post.
     * @return int[]
     */
    protected function get_medias_from_block_content($post_content)
    {
    }
    /**
     * Get the media ids from classic type content.
     *
     * @since 3.2
     *
     * @param string $post_content The content of the post.
     * @return int[]
     */
    protected function get_medias_from_html_content($post_content)
    {
    }
    /**
     * Retrieve media ids from shortcodes.
     *
     * @since 3.2
     *
     * @param string $post_content The content of the required post.
     * @return int[] The media ids.
     */
    protected function get_medias_from_shortcodes($post_content)
    {
    }
    /**
     * Retrieve media ids from img tags
     *
     * @since 3.2
     *
     * @param string $post_content The content of the post to search from.
     * @return int[] An array of media ids (empty if no media is found).
     */
    protected function get_medias_from_img_tags($post_content)
    {
    }
}