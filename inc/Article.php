<?php

namespace CB;

/**
 * Class Article
 *
 * Represents a news article with various attributes.
 */
class Article {
    /** @var string */
    private $uuid;

    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var string */
    private $keywords;

    /** @var string */
    private $snippet;

    /** @var string */
    private $url;

    /** @var string */
    private $image_url;

    /** @var string */
    private $language;

    /** @var string */
    private $published_at;

    /** @var string */
    private $source;

    /** @var array */
    private $categories;

    /** @var float */
    private $relevance_score;

    /** @var string */
    private $locale;

    /** @var float */
    private $sentiment_score;

    /** @var string */
    private $article_excerpt;

    /**
     * Article constructor.
     *
     * @param array $data Data to initialize the article.
     */
    public function __construct( array $data ) {
        $this->uuid = $data['uuid'] ?? '';
        $this->title = $data['title'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->keywords = $data['keywords'] ?? '';
        $this->snippet = $data['snippet'] ?? '';
        $this->url = $data['url'] ?? '';
        $this->image_url = $data['image_url'] ?? '';
        $this->language = $data['language'] ?? '';
        $this->published_at = $data['published_at'] ?? '';
        $this->source = $data['source'] ?? '';
        $this->categories = $data['categories'] ?? '';
        $this->relevance_score = $data['relevance_score'] ?? '';
        $this->locale = $data['locale'] ?? '';
        $this->sentiment_score = $data['sentiment_score'] ?? '';
        $this->article_excerpt = $data['article_excerpt'] ?? '';
    }

    /**
     * Get the UUID of the article.
     *
     * @return string
     */
    public function get_uuid(): string {
        return $this->uuid;
    }

    /**
     * Get the title of the article.
     *
     * @return string
     */
    public function get_title(): string {
        return $this->title;
    }

    /**
     * Get the description of the article.
     *
     * @return string
     */
    public function get_description(): string {
        return $this->description;
    }

    /**
     * Get the keywords of the article.
     *
     * @return string
     */
    public function get_keywords(): string {
        return $this->keywords;
    }

    /**
     * Get the snippet of the article.
     *
     * @return string
     */
    public function get_snippet(): string {
        return $this->snippet;
    }

    /**
     * Get the URL of the article.
     *
     * @return string
     */
    public function get_url(): string {
        return $this->url;
    }

    /**
     * Get the image URL of the article.
     *
     * @return string
     */
    public function get_image_url(): string {
        return $this->image_url;
    }

    /**
     * Get the language of the article.
     *
     * @return string
     */
    public function get_language(): string {
        return $this->language;
    }

    /**
     * Get the publication date of the article.
     *
     * @return string
     */
    public function get_published_at(): string {
        return $this->published_at;
    }

    /**
     * Get the source of the article.
     *
     * @return string
     */
    public function get_source(): string {
        return $this->source;
    }

    /**
     * Get the categories of the article.
     *
     * @return array
     */
    public function get_categories(): array {
        return $this->categories;
    }

    /**
     * Get the relevance score of the article.
     *
     * @return float
     */
    public function get_relevance_score(): float {
        return $this->relevance_score;
    }

    /**
     * Get the locale of the article.
     *
     * @return string
     */
    public function get_locale(): string {
        return $this->locale;
    }

    /**
     * Get the sentiment score of the article.
     *
     * @return float
     */
    public function get_sentiment_score(): float {
        return $this->sentiment_score;
    }

    /**
     * Get the excerpt of the article.
     *
     * @return string
     */
    public function get_article_excerpt(): string {
        return $this->article_excerpt;
    }

    /**
     * Set the UUID of the article.
     *
     * @param string $uuid The UUID.
     * @return void
     */
    public function set_uuid( string $uuid ): void {
        $this->uuid = $uuid;
    }

    /**
     * Set the title of the article.
     *
     * @param string $title The title.
     * @return void
     */
    public function set_title( string $title ): void {
        $this->title = $title;
    }

    /**
     * Set the description of the article.
     *
     * @param string $description The description.
     * @return void
     */
    public function set_description( string $description ): void {
        $this->description = $description;
    }

    /**
     * Set the keywords of the article.
     *
     * @param string $keywords The keywords.
     * @return void
     */
    public function set_keywords( string $keywords ): void {
        $this->keywords = $keywords;
    }

    /**
     * Set the snippet of the article.
     *
     * @param string $snippet The snippet.
     * @return void
     */
    public function set_snippet( string $snippet ): void {
        $this->snippet = $snippet;
    }

    /**
     * Set the URL of the article.
     *
     * @param string $url The URL.
     * @return void
     */
    public function set_url( string $url ): void {
        $this->url = $url;
    }

    /**
     * Set the image URL of the article.
     *
     * @param string $image_url The image URL.
     * @return void
     */
    public function set_image_url( string $image_url ): void {
        $this->image_url = $image_url;
    }

    /**
     * Set the language of the article.
     *
     * @param string $language The language.
     * @return void
     */
    public function set_language( string $language ): void {
        $this->language = $language;
    }

    /**
     * Set the publication date of the article.
     *
     * @param string $published_at The publication date.
     * @return void
     */
    public function set_published_at( string $published_at ): void {
        $this->published_at = $published_at;
    }

    /**
     * Set the source of the article.
     *
     * @param string $source The source.
     * @return void
     */
    public function set_source( string $source ): void {
        $this->source = $source;
    }

    /**
     * Set the categories of the article.
     *
     * @param string $categories The categories.
     * @return void
     */
    public function set_categories( string $categories ): void {
        $this->categories = $categories;
    }

    /**
     * Set the relevance score of the article.
     *
     * @param string $relevance_score The relevance score.
     * @return void
     */
    public function set_relevance_score( string $relevance_score ): void {
        $this->relevance_score = $relevance_score;
    }

    /**
     * Set the locale of the article.
     *
     * @param string $locale The locale.
     * @return void
     */
    public function set_locale( string $locale ): void {
        $this->locale = $locale;
    }

    /**
     * Set the sentiment score of the article.
     *
     * @param string $sentiment_score The sentiment score.
     * @return void
     */
    public function set_sentiment_score( string $sentiment_score ): void {
        $this->sentiment_score = $sentiment_score;
    }

    /**
     * Set the excerpt of the article.
     *
     * @param string $article_excerpt The article excerpt.
     * @return void
     */
    public function set_article_excerpt( string $article_excerpt ): void {
        $this->article_excerpt = $article_excerpt;
    }
}
