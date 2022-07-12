<?php

/**
 * Class PLL_Translation_Metas
 *
 * @package polylang-pro
 */
/**
 * Abstract class to manage the import of metas.
 *
 * @since 3.2
 */
abstract class PLL_Translation_Metas
{
    /**
     * Meta type. Typically 'post' or 'term' and must be filled by the child class.
     *
     * @var string
     */
    protected $meta_type;
    /**
     * The context to translate entry.
     *
     * @var string
     */
    protected $context;
    /**
     * Translations set where to look for the post metas translations.
     *
     * @var Translations
     */
    protected $translations;
    /**
     * Translates the metas from a given object.
     *
     * @since 3.2
     *
     * @param int $src_object_id The source object to get the metas from.
     * @param int $tr_object_id  The translated object to translate the metas from.
     * @return void
     */
    public function translate($src_object_id, $tr_object_id)
    {
    }
    /**
     * Setter for translations set
     *
     * @since 3.2
     *
     * @param Translations $translations A set of translations to search the metas translations in.
     * @return void
     */
    public function set_translations($translations)
    {
    }
}
/**
 * @package polylang-pro
 */
/**
 * Class PLL_Translation_Post_Metas
 *
 * @since 3.2
 *
 * Translate post metas from a set of translation entries.
 */
class PLL_Translation_Post_Metas extends \PLL_Translation_Metas
{
    /**
     * The PLL_Translation_Post_Metas constructor that allows to define the meta type.
     */
    public function __construct()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translations_Identified
 *
 * Extends a Translations object, and allows to add entries with the PLL_Translation_Entry_Identified class.
 */
class PLL_Translations_Identified extends \Translations
{
    /**
     * Clone the parent method and use PLL_Translation_Entry_Identified instead of Translation_Entry.
     *
     * @see https://github.com/WordPress/WordPress/blob/6.0/wp-includes/pomo/translations.php#L24
     *
     * @since 3.3
     *
     * @param array|PLL_Translation_Entry_Identified $entry An entry (or an array with entry's data) to add to the set of translations entries.
     * @return bool true on success, false if the entry doesn't have a key
     */
    public function add_entry($entry)
    {
    }
    /**
     * Clone the parent method and use PLL_Translation_Entry_Identified instead of Translation_Entry.
     *
     * @see https://github.com/WordPress/WordPress/blob/6.0/wp-includes/pomo/translations.php#L40
     *
     * @since 3.3
     *
     * @param array|PLL_Translation_Entry_Identified $entry An entry (or an array with entry's data) to add to the set of translations entries.
     * @return bool
     */
    public function add_entry_or_merge($entry)
    {
    }
}
/**
 * @package polylang-pro
 */
/**
 * Translate post taxonomies from a set of translation entries.
 */
class PLL_Translation_Term_Model
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
     * Used to translate term meta with a set an translation entries.
     *
     * @var PLL_Translation_Term_Metas
     */
    private $translation_term_metas;
    /**
     * PLL_Translation_Term_Model constructor.
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
     * @return void
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
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Walker_Interface
 *
 * Define interface for classes that iterate over content.
 *
 * @since 3.3
 */
interface PLL_Translation_Walker_Interface
{
    /**
     * Iterates over each translatable part of a content and applies a callback function on each part.
     *
     * @since 3.3
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
 * @since 3.3
 *
 * Applies a callback over an HTML formatted string.
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
     * Callback to execute on translatable content.
     *
     * @var callable
     */
    private $callback;
    /**
     * PLL_Content_Walker_Classic constructor.
     *
     * @since 3.3
     *
     * @param string $content Classic editor HTML content.
     */
    public function __construct($content)
    {
    }
    /**
     * Applies the defined callback on the content, and then returns a transformed content.
     *
     * @since 3.3
     *
     * @param callable $callback A transformation to apply to the content, whether it is for export or import.
     * @return string
     */
    public function walk($callback)
    {
    }
    /**
     * Applies a callback on a given post content, whether it is to add a translation entry or translate it.
     *
     * @since 3.3
     *
     * @param string $content A post content to apply a callback onto.
     * @return string The processed content.
     */
    private function apply($content)
    {
    }
    /**
     * Checks if the translation entry exists and return it, otherwise return the source text.
     *
     * @since 3.3
     *
     * @param PLL_Translation_Entry_Identified $entry A translation entry parsed from a translation document.
     * @return string The translated string.
     */
    private function maybe_translate_entry($entry)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Manages posts translations.
 *
 * @since 3.3
 */
class PLL_Translation_Post_Model
{
    /**
     * @var PLL_Translation_Content
     */
    protected $translate_content;
    /**
     * @var PLL_Translation_Post_Metas
     */
    protected $translate_post_metas;
    /**
     * @var PLL_Sync_Content
     */
    protected $sync_content;
    /**
     * Used to query languages and translations.
     *
     * @var PLL_Model
     */
    protected $model;
    /**
     * @var PLL_Sync
     */
    protected $sync;
    /**
     * Constructor.
     *
     * @since 3.3
     *
     * @param object $polylang Polylang object.
     */
    public function __construct(&$polylang)
    {
    }
    /**
     * Translates a post in a given language.
     *
     * @since 3.3
     *
     * @param  array        $entry           {@see PLL_Xliff_Export::get_next_entry()} output.
     * @param  PLL_Language $target_language A language to translate into.
     * @return int The translated post ID, 0 on failure.
     */
    public function translate_post($entry, $target_language)
    {
    }
    /**
     * Creates a new post translation.
     *
     * @since 3.3
     *
     * @param array        $data_import {
     *    Import options.
     *    string $post_status The post status of the imported posts.
     * }.
     * @param WP_Post      $source_post     The source post object.
     * @param PLL_Language $target_language The language to translate into.
     * @return int The translated post ID, 0 on failure.
     */
    protected function create_post_translation($data_import, $source_post, $target_language)
    {
    }
    /**
     * Saves the translations group.
     *
     * @since 3.3
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
     * Updates an existing post translation.
     *
     * @since 3.3
     *
     * @param WP_Post      $source_post     The source post object.
     * @param WP_Post      $tr_post         The translated post object.
     * @param PLL_Language $target_language The language to translate into.
     * @return int The translated post ID, 0 on failure.
     */
    protected function update_post_translation($source_post, $tr_post, $target_language)
    {
    }
    /**
     * Translates all content type of a post (i.e. title, excerpt and content).
     *
     * @since 3.3
     *
     * @param WP_Post      $source_post     The source post object.
     * @param WP_Post      $tr_post         The translated post object.
     * @param PLL_Language $target_language The language to translate into.
     * @return WP_Post|int The translated post object populated with new data. 0 otherwise.
     */
    protected function translate_content($source_post, $tr_post, $target_language)
    {
    }
    /**
     * Clones the source post giving a base for the later translated post.
     *
     * @since 3.3
     *
     * @param WP_Post $source_post The Source Post.
     * @return WP_Post The cloned post.
     */
    protected function clone_source_post($source_post)
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
     * @param array  $block An array mimicking a WP_Block_Parser_Block {@link https://github.com/WordPress/wordpress-develop/blob/5.9.3/src/wp-includes/class-wp-block-parser.php#L15}.
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
    private $rules = array('core/paragraph' => array('//p'), 'core/heading' => array('//*[self::h1 or self::h2 or self::h3 or self::h4 or self::h5 or self::h6]'), 'core/buttons' => array(), 'core/button' => array('//a'), 'core/image' => array('//figure/figcaption', '//figure/img/@alt'), 'core/gallery' => array('//figure/figcaption', '//figure/img/@alt'), 'core/media-text' => array('//figure/img/@alt'), 'core/list' => array('//ul/li|//ol/li'), 'core/quote' => array('//blockquote/p', '//blockquote/cite'), 'core/audio' => array('//figure/figcaption'), 'core/video' => array('//figure/figcaption'), 'core/file' => array('//div/a'), 'core/cover' => array('//div/p'), 'core/subhead' => array('//p'), 'core/verse' => array('//pre'), 'core/table' => array('//th', '//td', '//figure/figcaption'), 'core/preformatted' => array('//pre'), 'core/pullquote' => array('//blockquote/p', '//blockquote/cite'), 'core/text-columns' => array('//div[@class="wp-block-column"]'), 'core/embed' => array('//figure/figcaption'), 'core-embed/twitter' => array('//figure/figcaption'), 'core-embed/youtube' => array('//figure/figcaption'), 'core-embed/facebook' => array('//figure/figcaption'), 'core-embed/instagram' => array('//figure/figcaption'), 'core-embed/vimeo' => array('//figure/figcaption'), 'core-embed/soundcloud' => array('//figure/figcaption'), 'core-embed/spotify' => array('//figure/figcaption'), 'core-embed/flickr' => array('//figure/figcaption'), 'core-embed/animoto' => array('//figure/figcaption'), 'core-embed/collegehumor' => array('//figure/figcaption'), 'core-embed/dailymotion' => array('//figure/figcaption'), 'core-embed/funnyordie' => array('//figure/figcaption'), 'core-embed/hulu' => array('//figure/figcaption'), 'core-embed/imgur' => array('//figure/figcaption'), 'core-embed/issuu' => array('//figure/figcaption'), 'core-embed/kickstarter' => array('//figure/figcaption'), 'core-embed/meetup-com' => array('//figure/figcaption'), 'core-embed/mixcloud' => array('//figure/figcaption'), 'core-embed/photobucket' => array('//figure/figcaption'), 'core-embed/polldaddy' => array('//figure/figcaption'), 'core-embed/reddit' => array('//figure/figcaption'), 'core-embed/reverbnation' => array('//figure/figcaption'), 'core-embed/screencast' => array('//figure/figcaption'), 'core-embed/scribd' => array('//figure/figcaption'), 'core-embed/slideshare' => array('//figure/figcaption'), 'core-embed/smugmug' => array('//figure/figcaption'), 'core-embed/speaker' => array('//figure/figcaption'), 'core-embed/ted' => array('//figure/figcaption'), 'core-embed/tumblr' => array('//figure/figcaption'), 'core-embed/videopress' => array('//figure/figcaption'), 'core-embed/wordpress' => array('//figure/figcaption'), 'core-embed/wordpress-tv' => array('//figure/figcaption'));
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
     * Returns an empty array if the parsing rules are not defined.
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
     * @return string
     */
    public function translate_content($content)
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
 * Class PLL_Translation_Walker_Factory
 *
 * A factory to create a translation walker with a given content.
 *
 * @since 3.3
 */
class PLL_Translation_Walker_Factory
{
    /**
     * Generates the correct walker class for the content to be walked.
     *
     * @since 3.3
     *
     * @param string $content          A content to iterate over.
     * @return PLL_Translation_Walker_Interface
     */
    public static function create_from($content)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Translation_Entry_Identified
 *
 * Extends Translation_Entry to allow the identification of the entry through the 'id' property.
 */
class PLL_Translation_Entry_Identified extends \Translation_Entry
{
    /**
     * Uniquely identifies the translation, whether its string has changed or not.
     *
     * @var string $id
     */
    protected $id;
    /**
     * PLL_Translation_Entry_Identified constructor.
     * Identify the translation entry automatically.
     *
     * @see https://developer.wordpress.org/reference/classes/translation_entry/
     *
     * @since 3.3
     *
     * @param array $entry A translation entry arguments. Default: empty array.
     */
    public function __construct($entry = array())
    {
    }
    /**
     * Returns the identifier of the entry.
     *
     * @since 3.3
     *
     * @return string
     */
    public function get_id()
    {
    }
}
/**
 * @package polylang-pro
 */
/**
 * Class PLL_Translation_Term_Metas
 *
 * @since 3.2
 *
 * Translate term metas from a set of translation entries.
 */
class PLL_Translation_Term_Metas extends \PLL_Translation_Metas
{
    /**
     * The PLL_Translation_Term_Metas constructor that allows to define the meta type.
     */
    public function __construct()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Abstract class to manage the export of metas.
 *
 * @since 3.3
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
     * @since 3.3
     *
     * @return string[] List of custom fields names.
     */
    protected function get_meta_names_to_export()
    {
    }
    /**
     * Export metas to translate, along their translated values if possible.
     *
     * @since 3.3
     *
     * @param PLL_Export_Multi_Files $export Represent export file.
     * @param int                    $from   Id of the source object.
     * @param int                    $to     Id of the target object.
     * @return PLL_Export_Multi_Files Export file with corresponding metas added.
     */
    public function export($export, $from, $to = 0)
    {
    }
    /**
     * Maybe exports metas sub fields recursively if the given meta values is contained in the fields to export.
     *
     * @since 3.3
     *
     * @param array                  $fields_to_export  A recursive array containing nested meta sub keys to translate.
     *     @example array(
     *        'sub_key_to_translate_1' => 1,
     *        'sub_key_to_translate_2' => array(
     *             'sub_sub_key_to_translate_1' => 1,
     *         ),
     *      ),
     *    )
     * @param string                 $parent_key_string A string containing parent keys separated with pipes.
     * @param int                    $index             Index of the current meta value. Usefull when a meta has several values.
     * @param array                  $source_metas      The source post metas.
     * @param array                  $tr_metas          The translated post metas.
     * @param PLL_Export_Multi_Files $export            Represents the export file.
     * @return bool True if the meta value has been exported, false otherwise.
     */
    public function maybe_export_metas_sub_fields($fields_to_export, $parent_key_string, $index, $source_metas, $tr_metas, $export)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Export_Post_Meta
 *
 * @since 3.3
 */
class PLL_Export_Post_Metas extends \PLL_Export_Metas
{
    /**
     * Constructor.
     *
     * @since 3.3
     */
    public function __construct()
    {
    }
    /**
     * Get the meta names to export.
     *
     * @since 3.3
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
 * @since 3.3
 */
class PLL_Export_Term_Metas extends \PLL_Export_Metas
{
    /**
     * Constructor.
     *
     * @since 3.3
     */
    public function __construct()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Export_Post
 *
 * @since 3.3
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
     * @since 3.3
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
     * @since 3.3
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
 * @since 3.3
 */
class PLL_Export_Bulk_Option extends \PLL_Bulk_Translate_Option
{
    /**
     * Represents the current file or multiple files to export.
     *
     * @var PLL_Export_Multi_Files
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
     * PLL_Export_Bulk_Option constructor.
     *
     * @since 3.3
     *
     * @param PLL_Model $model Used to query languages and post translations.
     */
    public function __construct($model)
    {
    }
    /**
     * Defines wether the export Bulk Translate option is available given the admin panel and user logged.
     * Do not add the 'export' bulk translate option if LIBXML extension is not loaded, no matter the screen.
     *
     * @since 3.3
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
     * @since 3.3
     *
     * @param int[]    $post_ids         The ids of the posts selected for export.
     * @param string[] $target_languages The target languages.
     *
     * @throws Exception Exception.
     *
     * @return void|array {
     *     array PLL_Bulk_Translate::ERROR Error notices to be displayed to the user when something wrong occurs when exporting.
     * }
     *
     * @phpstan-param non-empty-array<int<1,max>> $post_ids
     * @phpstan-param non-empty-array<string> $target_languages
     * @phpstan-return void|array{
     *     error: array<0,string>
     * }
     */
    public function do_bulk_action($post_ids, $target_languages)
    {
    }
    /**
     * Exports the posts with their related items and create
     * the files before redirecting.
     *
     * @since 3.3
     *
     * @param PLL_Export_Download_Zip $downloader       Handles the creation of a zip file containing the export.
     * @param int[]                   $post_ids         The ids of the posts selected for export.
     * @param string[]                $target_languages The target languages.
     * @return void
     */
    protected function export($downloader, $post_ids, $target_languages)
    {
    }
    /**
     * Get post data from id
     *
     * @since 3.3
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
     * Sort post ids by their language.
     *
     * @since 3.3
     *
     * @param int[]    $post_ids         An array of posts IDs to translate.
     * @param string[] $target_languages The target languages slugs for translation.
     *
     * @return array[
     *     string The target language slug.
     *     int[]  An array of posts ID to translate for the target language.
     * ]
     */
    public function sort_posts_by_language($post_ids, $target_languages)
    {
    }
    /**
     * Checks there is no ambiguity in the selected posts to export.
     * Ambiguity happens when 2 posts that are translations of each other are selected to be translated.
     *
     * @since 3.3
     *
     * @param  array<int> $post_ids The ids of the posts selected for export.
     * @return WP_Error|false       An error if an ambiguity is found, false otherwise. The error message should not be
     *                              escaped: it contains `<br>` tags and the texts are already escaped.
     *
     * @phpstan-param array<int<1,max>> $post_ids
     */
    protected function is_ambiguous(array $post_ids)
    {
    }
    /**
     * Find duplicate translations among the given list of post IDs.
     *
     * @since 3.3
     *
     * @param  array<int> $post_ids The ids of the posts selected for export.
     * @return array<int>           A list of arrays of post IDs.
     *
     * @phpstan-param array<int<1,max>> $post_ids
     * @phpstan-return array<array<int<1,max>>>
     */
    protected function find_duplicate_translations(array $post_ids)
    {
    }
    /**
     * Returns a list of post titles, given a list of post IDs.
     *
     * @since 3.3
     *
     * @param  array<int> $post_ids The ids of the posts selected for export.
     * @return array<string>        An array of post titles, keyed by post ID.
     *
     * @phpstan-param array<int<1,max>> $post_ids
     * @phpstan-return array<int<1,max>,string>
     */
    protected function get_post_titles(array $post_ids)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * A class to handle posts import.
 *
 * @since 3.3
 */
class PLL_Import_Posts implements \PLL_Import_Object_Interface
{
    /**
     * Handle translation of posts
     *
     * @var PLL_Translation_Post_Model
     */
    protected $translation_post_model;
    /**
     * The success counter.
     *
     * @var int
     */
    protected $success;
    /**
     * The posts status to import with.
     *
     * @var string
     */
    private $post_status;
    /**
     * The non existing post ids for the warning.
     *
     * @var int[]
     */
    protected $non_existing_post_ids = array();
    /**
     * Constructor
     *
     * @since 3.3
     *
     * @param PLL_Translation_Post_Model $translation_post_model The PLL_Translation_Post_Model object.
     */
    public function __construct($translation_post_model)
    {
    }
    /**
     * Handles the import of posts.
     *
     * @since 3.3
     *
     * @param array        $entry           The current entry to import.
     * @param PLL_Language $target_language The targeted language for import.
     */
    public function translate($entry, $target_language)
    {
    }
    /**
     * Retrieves the status for the imported posts in the HTTP request.
     *
     * @since 3.3
     *
     * @return string publish or draft.
     */
    protected function get_post_status()
    {
    }
    /**
     * Get update notices to display.
     *
     * @since 3.3
     *
     * @return WP_Error
     */
    public function get_updated_notice()
    {
    }
    /**
     * Get warnings notices to display.
     *
     * @since 3.3
     *
     * @return WP_Error
     */
    public function get_warning_notice()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * A class to handle terms import.
 *
 * @since 3.3
 */
class PLL_Import_Terms implements \PLL_Import_Object_Interface
{
    /**
     * Handle translation of terms
     *
     * @var PLL_Translation_Term_Model
     */
    private $translation_term_model;
    /**
     * The success counter.
     *
     * @var int
     */
    protected $success;
    /**
     * Constructor.
     *
     * @since 3.3
     *
     * @param PLL_Translation_Term_Model $translation_term_model The PLL_Translation_Term_Model object.
     */
    public function __construct($translation_term_model)
    {
    }
    /**
     * Handles the import of terms.
     *
     * @since 3.3
     *
     * @param array        $entry           The current entry to import.
     * @param PLL_Language $target_language The targeted language for import.
     */
    public function translate($entry, $target_language)
    {
    }
    /**
     * Get update notices to display.
     *
     * @since 3.3
     *
     * @return WP_Error
     */
    public function get_updated_notice()
    {
    }
    /**
     * Get warnings notices to display.
     *
     * @since 3.3
     *
     * @return WP_Error
     */
    public function get_warning_notice()
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * A Service to collect linked post ids.
 *
 * @since 3.3
 */
class PLL_Collect_Linked_Posts
{
    /**
     * Stores the plugin options.
     *
     * @var array
     */
    protected $options;
    /**
     * PLL_Collect_Linked_Posts constructor.
     *
     * @since 3.3
     *
     * @param array $options The plugin options.
     */
    public function __construct($options)
    {
    }
    /**
     * Gets all the post ids linked to a set of posts.
     *
     * @since 3.3
     *
     * @param int[] $post_ids An array of post ids.
     *
     * @return int[] An array of linked post ids.
     */
    public function get_linked_post_ids($post_ids)
    {
    }
    /**
     * Gets the post ids from a post, wether it's classic or block edited.
     *
     * @since 3.3
     *
     * @param WP_Post $post A given WP_Post object.
     * @return int[] An array of post ids.
     */
    protected function get_post_ids_from_post($post)
    {
    }
    /**
     * Gets the post ids from block type content.
     *
     * @since 3.3
     *
     * @param string $post_content The content of the post.
     * @return int[] An array of post ids.
     */
    protected function get_post_ids_from_block_content($post_content)
    {
    }
    /**
     * Gets the post ids from blocks.
     *
     * @since 3.3
     *
     * @param array $blocks An array of blocks.
     * @return int[] An array of post ids.
     */
    protected function get_post_ids_from_blocks_deep($blocks)
    {
    }
    /**
     * Gets the media ids from a block.
     *
     * @since 3.3
     *
     * @param array $block A representative array of a block.
     * @return int[] An array of media ids, empty if none found.
     */
    protected function get_media_ids_from_block($block)
    {
    }
    /**
     * Gets the media ids from classic type content.
     *
     * @since 3.3
     *
     * @param string $post_content The content of the post.
     * @return int[]
     */
    protected function get_medias_from_html_content($post_content)
    {
    }
    /**
     * Gets media ids from shortcodes.
     *
     * @since 3.3
     *
     * @param string $post_content The content of the required post.
     * @return int[] The media ids.
     */
    protected function get_medias_from_shortcodes($post_content)
    {
    }
    /**
     * Gets media ids from img tags
     *
     * @since 3.3
     *
     * @param string $post_content The content of the post to search from.
     * @return int[] An array of media ids (empty if no media is found).
     */
    protected function get_medias_from_img_tags($post_content)
    {
    }
    /**
     * Gets id from a reusable block.
     * Also recursively get contained reusable block ids.
     *
     * @since 3.3
     *
     * @param array $block An array contianing block data.
     * @return int[] An array of reusable block ids, empty if none found.
     */
    protected function get_reusable_block_ids($block)
    {
    }
}