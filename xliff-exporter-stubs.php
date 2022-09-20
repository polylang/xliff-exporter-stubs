<?php

/**
 * @package Polylang-Pro
 */
// phpcs:disable WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
/**
 * Provides a few tools to manipulate content by using `DOMDocument`.
 *
 * @since 3.3
 */
class PLL_DOM_Content
{
    /**
     * The content to work with.
     *
     * @var string
     */
    private $content;
    /**
     * The site's charset.
     *
     * @var string
     */
    private $charset;
    /**
     * Placeholder used in {@see PLL_DOM_Content::replace_content()}.
     *
     * @var string
     * @phpstan-var non-empty-string
     */
    private $placeholder;
    /**
     * Constructor.
     *
     * @since 3.3
     *
     * @param string $content The content to work with.
     */
    public function __construct($content)
    {
    }
    /**
     * Extracts strings from content, given a list of parsing rules.
     *
     * @since 3.3
     * @uses DOMXPath
     *
     * @param  array<string> $rules Parsing rules. Ex: `[ '//figure/img/@alt' ]`.
     * @return array<string,string> Path to matching nodes as array keys, extracted strings as array values.
     *                              Ex: `[ '/figure/img[1]/@alt' => 'Image alt text.' ]`.
     */
    public function get_strings(array $rules)
    {
    }
    /**
     * Replaces strings in the content, given a list of parsing rules.
     *
     * @since 3.3
     * @uses DOMXPath
     *
     * @param  array<string,string> $new_strings Path to matching nodes as array keys, new strings as array values.
     *                                           Ex: `[ '/figure/img[1]/@alt' => 'New image alt text.' ]`.
     * @return string                            Content with replaced strings.
     */
    public function replace_content(array $new_strings)
    {
    }
    /**
     * Returns the first `DOMNode` element from a `DOMNodeList`.
     *
     * @since 3.3
     *
     * @param  DOMNodeList $node_list A `DOMNodeList` element.
     * @return DOMNode|null           A `DOMNode` element, or null if no elements have been found.
     */
    private function get_first_dom_node(\DOMNodeList $node_list)
    {
    }
    /**
     * Returns a node's content.
     * If the node is an attribute, the attribute's value is returned.
     * If the node is a tag, the tag's HTML is returned.
     *
     * @since 3.3
     *
     * @param  DOMNode $node A node.
     * @return string
     */
    private function get_node_content(\DOMNode $node)
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
     * @since 3.3
     *
     * @param PLL_Settings|PLL_Admin $polylang Polylang object.
     */
    public function __construct(&$polylang)
    {
    }
    /**
     * Setter for translations.
     *
     * @since 3.3
     *
     * @param  PLL_Translations_Identified $translations A set of translations to search the metas translations in.
     * @return void
     */
    public function set_translations($translations)
    {
    }
    /**
     * Translates a term.
     *
     * @since 3.3
     *
     * @param array        $entry Array of an entry properties.
     * @param PLL_Language $language The target language.
     * @return int The translated term id, 0 on failure.
     */
    public function translate_term($entry, $language)
    {
    }
    /**
     * Returns the translated term name if exists, the source name otherwise.
     *
     * @since 3.3
     *
     * @param WP_Term $source_term The source term object.
     * @return string The translated name.
     */
    private function get_translated_term_name($source_term)
    {
    }
    /**
     * Returns the translated term description if exists, the source description otherwise.
     *
     * @since 3.3
     *
     * @param WP_Term $source_term The source term object.
     * @return string The translated description.
     */
    private function get_translated_term_description($source_term)
    {
    }
    /**
     * Translates a given entry, returns the source string if no translation found.
     *
     * @since 3.3
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
     * List of contents that are not translatable, like placeholders.
     *
     * @var array<string>
     */
    private $non_translatable_contents;
    /**
     * PLL_Content_Walker_Classic constructor.
     *
     * @since 3.3
     *
     * @param string        $content Classic editor HTML content.
     * @param array<string> $non_translatable_contents List of contents that are not translatable, like placeholders.
     */
    public function __construct($content, array $non_translatable_contents = array())
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
     * Service to manage user capabilities, espcecially 'unfiltered_html'.
     *
     * @var PLL_Manage_User_Capabilities
     */
    protected $user_capabilities_manager;
    /**
     * Constructor.
     *
     * @since 3.3
     *
     * @param PLL_Settings|PLL_Admin $polylang Polylang object.
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
    /**
     * Translates post parent if there is one.
     *
     * @since 3.3
     *
     * @param int[]        $post_ids Array of source post ids.
     * @param PLL_Language $language The target language.
     * @return void
     */
    public function translate_parent_for_posts(array $post_ids, \PLL_Language $language)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Holds the rules defining which part of a block should be "translated".
 * Translated may mean different actions, like exporting it into a translation file, or updating the database...
 *
 * @since 3.3
 */
class PLL_Translation_Block_Parsing_Rules
{
    /**
     * Caches values about parsable and non-parsable blocks.
     *
     * @var array<string,mixed>
     */
    private $cache = array();
    /**
     * Holds some rules for block attributes to translate.
     * Keep this list alphabetically sorted when adding entries.
     *
     * @var array<string,array<string>> $parsing_rules_attributes
     */
    private $parsing_rules_attributes = array('core/navigation-link' => array('description'), 'core/post-navigation-link' => array('label'), 'core/read-more' => array('content'), 'core/search' => array('label', 'placeholder', 'buttonText'));
    /**
     * Holds some rules as Xpath expressions to evaluate in the blocks content.
     * Keep this list alphabetically sorted when adding entries.
     *
     * @var array<string,array<string>> $parsing_rules
     */
    private $parsing_rules = array('core/audio' => array('//figure/figcaption'), 'core/button' => array('//a', '//a/@href'), 'core/cover' => array('//div/p'), 'core/cover-image' => array('//div/p'), 'core/embed' => array('//figure/figcaption'), 'core/file' => array('//div/a'), 'core/gallery' => array('//figure/figcaption', '//figure/img/@alt'), 'core/heading' => array('//*[self::h1 or self::h2 or self::h3 or self::h4 or self::h5 or self::h6]'), 'core/image' => array('//figure/figcaption', '//figure/img/@alt|//figure/a/img/@alt', '//figure/img/@title|//figure/a/img/@title', '//figure/a/@href'), 'core/list' => array('//ul/li|//ol/li'), 'core/media-text' => array('//figure/img/@alt'), 'core/paragraph' => array('//p'), 'core/preformatted' => array('//pre'), 'core/pullquote' => array('//blockquote/p', '//blockquote/cite'), 'core/quote' => array('//blockquote/p', '//blockquote/cite'), 'core/subhead' => array('//p'), 'core/table' => array('//th', '//td', '//figure/figcaption'), 'core/text-columns' => array('//div[@class="wp-block-column"]'), 'core/verse' => array('//pre'), 'core/video' => array('//figure/figcaption'));
    /**
     * List of known blocks that don't need to be parsed, because they don't contain contents to be translated.
     * Though, they may contain blocks that need to be parsed.
     * Keep this list alphabetically sorted when adding entries.
     *
     * @var array<string> $blocks_not_to_parse
     */
    private $blocks_not_to_parse = array('core/buttons', 'core/code', 'core/column', 'core/columns', 'core/group', 'core/more', 'core/nextpage', 'core/separator', 'core/shortcode', 'core/spacer');
    /**
     * Holds the name of the block type being currently parsed.
     *
     * @var string $block_type Similar to {@see WP_Block_Parser_Block::$blockName}.
     */
    private $block_type;
    /**
     * Only keeps the rules matching a certain block type.
     *
     * @since 3.3
     *
     * @param string $block_type {@see WP_Block_Parser_Block::$blockName}.
     * @return PLL_Translation_Block_Parsing_Rules $this This object with its $rules property updated.
     */
    public function set_block_name($block_type)
    {
    }
    /**
     * Extracts translatable parts from the block content.
     * Returns an empty array if the parsing rules are not defined.
     *
     * @since 3.3
     *
     * @param  string $content      {@see WP_Block_Parser_Block::$innerContent}.
     * @return array<string,string> Parsing rules as array keys, strings to translate as array values.
     */
    public function parse($content)
    {
    }
    /**
     * Tells if a block should be parsed using Xpath rules.
     *
     * @since 3.3
     *
     * @param array $block An array mimicking a {@see WP_Block_Parser_Block}.
     * @return bool
     */
    public function has_parsing_rules($block)
    {
    }
    /**
     * Tells if a block needs to be parsed, because it contains contents to be translated.
     * Though, even if not, it may contain blocks that need to be parsed.
     *
     * @since 3.3
     *
     * @param array $block An array mimicking a {@see WP_Block_Parser_Block}.
     * @return bool
     */
    public function should_be_parsed($block)
    {
    }
    /**
     * Returns the rules as Xpath expressions to evaluate in the blocks content.
     *
     * @since 3.3
     *
     * @param  string|null $block_name Optional. The block name we want to get the parsing rules for. Only necessary for
     *                                 back-compatibility with the old `core-embed/` blocks.
     * @return array<string,array<string>>
     */
    private function get_parsing_rules($block_name = \null)
    {
    }
    /**
     * Returns the rules for the attributes to translate.
     *
     * @return array<string,array<string>>
     */
    private function get_parsing_rules_for_attributes()
    {
    }
    /**
     * Returns the list of blocks not to parse.
     *
     * @since 3.3
     *
     * @return array<string>
     */
    private function get_blocks_not_to_parse()
    {
    }
    /**
     * Checks if a block has translatable attributes (or not) and returns them.
     *
     * @since 3.3
     *
     * @param  array $block         An array mimicking a {@see WP_Block_Parser_Block}.
     * @return array<string,string> An array with attributes to translate or an empty array.
     */
    public function get_attributes_to_translate($block)
    {
    }
}
/**
 * Class PLL_Translation_Metas
 *
 * @package polylang-pro
 */
/**
 * Abstract class to manage the import of metas.
 *
 * @since 3.3
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
     * @var PLL_Translations_Identified
     */
    protected $translations;
    /**
     * Object to manage copied metas during import.
     *
     * @var PLL_Sync_Metas
     */
    protected $sync_metas;
    /**
     * Array containing meta keys to translate.
     *
     * @var array[] {
     *     A list of arrays described as follow:
     *
     *     @type string   $meta_key       The name of the meta.
     *     @type string[] $meta_sub_keys  The meta sub-fields to translate.
     *     @type int      $value_position The position of the value in case of multiple values.
     * }
     * @phpstan-var array<int, array{meta_key: string, meta_sub_keys: array<int, string>, value_position: int}>
     */
    protected $metas_to_translate;
    /**
     * Constructor.
     *
     * @since 3.3
     *
     * @param PLL_Sync_Metas $sync_metas Object to manage copied metas during import.
     */
    public function __construct(\PLL_Sync_Metas $sync_metas)
    {
    }
    /**
     * Translates the metas from a given object, whether it's a copy or a real translation.
     *
     * @since 3.3
     *
     * @param int          $src_object_id   Source object to get the metas from.
     * @param int          $tr_object_id    Translated object to translate the metas from.
     * @param PLL_Language $target_language Target language object.
     * @param bool         $copy            Whether to copy source metas. For instance, if the translation is updated, there is no need to copy source metas.
     * @return void
     */
    public function translate($src_object_id, $tr_object_id, \PLL_Language $target_language, $copy)
    {
    }
    /**
     * Setter for translations.
     *
     * @since 3.3
     *
     * @param PLL_Translations_Identified $translations A set of translations to search the metas translations in.
     * @return void
     */
    public function set_translations(\PLL_Translations_Identified $translations)
    {
    }
    /**
     * Removes meta keys to translate from an array of meta to copy.
     *
     * @since 3.3
     *
     * @param string[] $meta_keys Meta keys to copy.
     * @return string[] Filtered array of meta to copy.
     */
    public function remove_metas_to_translate($meta_keys)
    {
    }
    /**
     * Translates metas values.
     *
     * @since 3.3
     *
     * @param int $src_object_id Source object id.
     * @param int $tr_object_id  Translated object id.
     * @return void
     */
    private function translate_metas_values($src_object_id, $tr_object_id)
    {
    }
    /**
     * Inserts the translated metas into the database and
     * takes care to add multiples meta values if needed.
     * Note that if a meta has several values that aren't scalar,
     * they won't be inserted in the database to avoid to
     * delete potential useful data.
     *
     * @since 3.3
     *
     * @param int   $tr_object_id Translated object id.
     * @param array $tr_metas     Translated metas value(s).
     * @return void
     */
    private function insert_translated_metas($tr_object_id, array $tr_metas)
    {
    }
    /**
     * Returns the metas to translate from the translations entries.
     * Each meta translation entry is identified by a concatenation of
     * meta key, sub fields and position (or index) of the meta.
     * For instance: 'meta_key|with|sub|fields:2'.
     *
     * @since 3.3
     *
     * @return array[] {
     *     A list of arrays described as follow:
     *
     *     @type string   $meta_key       The name of the meta.
     *     @type string[] $meta_sub_keys  The meta sub-fields to translate.
     *     @type int      $value_position The position of the value in case of multiple values.
     * }
     * @phpstan-return array<int, array{meta_key: string, meta_sub_keys: array<int, string>, value_position: int}>
     */
    private function get_metas_to_translate()
    {
    }
    /**
     * Translates meta sub fields recursively.
     *
     * @since 3.3
     *
     * @param mixed    $meta_value     Meta value(s) to translate.
     * @param string[] $sub_keys       Array of sub fields to translate, ordered by dimension.
     * @param int      $value_position Position of the value, used if the meta has several values to translate.
     * @return mixed Translated meta value(s).
     */
    private function maybe_translate_metas_sub_fields($meta_value, array $sub_keys, $value_position)
    {
    }
    /**
     * Asserts the given value is an indexed array containing only scalar values.
     *
     * @since 3.3
     *
     * @param mixed $array Value to check.
     * @return bool True if it's an indexed array with only scalar values, false otherwise.
     */
    private function is_indexed_array_with_only_scalar_values($array)
    {
    }
}
/**
 * @package polylang-pro
 */
/**
 * Class PLL_Translation_Term_Metas
 *
 * @since 3.3
 *
 * Translate term metas from a set of translation entries.
 */
class PLL_Translation_Term_Metas extends \PLL_Translation_Metas
{
    /**
     * The PLL_Translation_Term_Metas constructor that allows to define the meta type.
     *
     * @since 3.3
     *
     * @param PLL_Sync_Term_Metas $sync_metas Object to manage copied term metas during import.
     */
    public function __construct(\PLL_Sync_Term_Metas $sync_metas)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * Class PLL_Content_Walker_Blocks
 *
 * @since 3.3
 *
 * Walk a block composed content to apply a translation callback on every translatable parts.
 */
class PLL_Translation_Walker_Blocks implements \PLL_Translation_Walker_Interface
{
    /**
     * Placeholder for inner blocks, used in exported contents.
     *
     * @var string
     */
    const BLOCK_PLACEHOLDER = '<pre>Polylang placeholder do not modify</pre>';
    /**
     * Holds the blocks parsed by the WP_Block_Parser.
     *
     * @var array<array>
     */
    private $blocks;
    /**
     * A reference to the block parsing rules.
     *
     * @var PLL_Translation_Block_Parsing_Rules
     */
    private $parsing_rules;
    /**
     * Holds the callback to be applied on each block, including the nested blocks.
     *
     * @var callable
     */
    private $callback;
    /**
     * HTML delimiter used in {@see PLL_Translation_Walker_Blocks::parse_as_html()}.
     *
     * @var string
     * @phpstan-var non-empty-string
     */
    private $placeholder_delimiter;
    /**
     * PLL_Content_Walker_Blocks constructor.
     *
     * @since 3.3
     *
     * @param  string $content An original (post?) content.
     */
    public function __construct($content)
    {
    }
    /**
     * Walks through the blocks and nested blocks to apply a callback on every one of them.
     *
     * @since 3.3
     *
     * @param callable $callback A callable to be applied on each block.
     *
     * @return string The walked content, eventually transformed by the callback.
     */
    public function walk($callback)
    {
    }
    /**
     * Recursively applies the callback provided to the {@see PLL_Translation_Walker_Blocks::walk()} method on a block.
     * Searches for translatable strings matching rules defined by {@see PLL_Translation_Rules_Block} and passes those to the callback function.
     * Delegates to {@see PLL_Translation_Walker_Classic} when no parsing rules match the current block being parsed.
     *
     * @since 3.3
     *
     * @param  array $block An associative array mimicking a WP_Block_Parser_Block object.
     * @return array        An array mimicking a WP_Block_Parser_Block object.
     */
    private function apply($block)
    {
    }
    /**
     * Recursively applies the callback provided to the {@see PLL_Translation_Walker_Blocks::walk()} method on a block.
     * Searches for translatable strings matching rules defined by {@see PLL_Translation_Rules_Block} and passes those to the callback function.
     *
     * @since 3.3
     *
     * @param  array $block An associative array mimicking a WP_Block_Parser_Block object.
     * @return array        An array mimicking a WP_Block_Parser_Block object.
     */
    private function parse_with_rules($block)
    {
    }
    /**
     * Parses a block's contents as HTML and applies the callback provided to the
     * {@see PLL_Translation_Walker_Blocks::walk()} method on these contents. Uses {@see PLL_Translation_Walker_Classic}.
     *
     * @since 3.3
     *
     * @param  array $block An associative array mimicking a WP_Block_Parser_Block object.
     * @return array        An array mimicking a WP_Block_Parser_Block object.
     */
    private function parse_as_html($block)
    {
    }
    /**
     * Returns a block's content as a string and with placeholders in place of sub-blocks, ready to be parsed.
     *
     * @since 3.3
     *
     * @param  array $block An associative array mimicking a WP_Block_Parser_Block object.
     * @return string       The block's content as a string and with placeholders in place of sub-blocks.
     */
    private function get_block_content_to_parse(array $block)
    {
    }
    /**
     * Puts a translated content back into a block.
     *
     * @since 3.3
     *
     * @param  array  $block   An associative array mimicking a WP_Block_Parser_Block object.
     * @param  string $content The content to put back into the block.
     * @return array           An array mimicking a WP_Block_Parser_Block object.
     */
    private function update_block_with_content(array $block, $content)
    {
    }
    /**
     * Returns the translatable block attributes and passes them to the callback function.
     *
     * @since 3.3
     *
     * @param  array                $block                   An associative array mimicking a WP_Block_Parser_Block object.
     * @param  array<string,string> $attributes_to_translate An array of attributes to translate.
     * @return array An array mimicking a WP_Block_Parser_Block object.
     */
    private function parse_attributes($block, $attributes_to_translate)
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
 * Class PLL_Translation_Post_Metas
 *
 * @since 3.3
 *
 * Translate post metas from a set of translation entries.
 */
class PLL_Translation_Post_Metas extends \PLL_Translation_Metas
{
    /**
     * The PLL_Translation_Post_Metas constructor that allows to define the meta type.
     *
     * @since 3.3
     *
     * @param PLL_Sync_Post_Metas $sync_metas Object to manage copied post metas during import.
     */
    public function __construct(\PLL_Sync_Post_Metas $sync_metas)
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
    /**
     * Returns the object type.
     *
     * @since 3.3
     *
     * @return string
     */
    public function get_type()
    {
    }
    /**
     * Returns the imported term ids.
     *
     * @since 3.3
     *
     * @return int[]
     */
    public function get_imported_object_ids()
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
     * The imported source post ids.
     *
     * @var int[]
     */
    protected $post_ids = array();
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
     * Performs actions on imported posts.
     * Translates posts parent.
     *
     * @since 3.3
     *
     * @param PLL_Language $target_language The targeted language for import.
     * @param int[]        $post_ids        The imported post ids of the import.
     * @return void
     */
    public function process_translated_post($target_language, $post_ids)
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
    /**
     * Returns the object type.
     *
     * @since 3.3
     *
     * @return string
     */
    public function get_type()
    {
    }
    /**
     * Returns the imported post ids.
     *
     * @since 3.3
     *
     * @return int[]
     */
    public function get_imported_object_ids()
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
    /**
     * Returns the ID from a navigation block.
     *
     * @since 3.3
     *
     * @param array $block An array containing block data.
     * @return array<int> An array of navigation post IDs, empty if none found.
     */
    protected function get_navigation_block_ids($block)
    {
    }
}
/**
 * @package Polylang-Pro
 */
/**
 * A Service to manage current user capabilities.
 *
 * @since 3.3
 */
class PLL_Manage_User_Capabilities
{
    /**
     * Removes the 'unfiltered_html' capability from the current user.
     *
     * @since 3.3
     *
     * @param WP_Post $source_post The source post about to be translated.
     * @return void
     */
    public function forbid_unfiltered_html($source_post)
    {
    }
    /**
     * Sets 'unfiltered_html' capability to default for users.
     *
     * @since 3.3
     *
     * @return void
     */
    public function allow_unfiltered_html()
    {
    }
    /**
     * Disallows 'unfiltered_html' capability.
     *
     * @since 3.3
     *
     * @param string[] $caps Primitive capabilities required of the user.
     * @param string   $cap  Capability being checked.
     * @return string[] Filtered primitive capabilities.
     */
    public function remove_unfiltered_html_cap($caps, $cap)
    {
    }
}