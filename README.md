# Crypto Blocks Plugin

## Getting Started

Follow these steps to get your demo environment up and running.

### Prerequisites

Ensure the following tools are installed on your system:

- [Docker](https://www.docker.com/)
- [Make]() (This is typically pre-installed on Unix-based systems, but you may need to install it manually on Windows or some Linux distributions)

### Quick Start
If you start the plugin using the `make start` command, the following steps will be automatically executed:

- A Docker container with WordPress will be created.
- The plugin will be copied into the WordPress instance.
- `composer install` and `npm install` will be executed to install dependencies.
- The plugin will be activated.
- A user will be added, and demo data for the plugin will be populated.
- All blocks will be visible on the homepage.

#### Quick Start Steps

1. **Clone the repository** (if you haven't already):

    ```sh
    git clone https://github.com/sodx/crypto-blocks.git
    cd crypto-blocks
    ```

2. **Run the setup script**:

   This script will install necessary dependencies and build the Docker container.

    ```sh
    make start
    ```

3. **Access the site**:

   Once the container is up and running, you can access your WordPress site with the demo plugin and test data installed at:

   [http://localhost:8000](http://localhost:8000)

   Use the following credentials to log in into the WordPress admin area:

    - **Username**: `admin`
    - **Password**: `admin`


## Custom Blocks

### Candlesticks

The `Candlesticks` block is used to display current market quotes in the form of candlestick charts. It has three attributes:

- `SOURCE` - The source of market quote data.
- `PAIR` - The currency pair (e.g., BTC/USD).
- `INTERVAL` - The time interval for candlestick charts (e.g., 1m, 5m, 1h, 1d).

The block dynamically fetches current market quotes and displays them as candlestick charts on the page.

#### Usage Example

1. Go to the Gutenberg editor.
2. Add the `Candlesticks Chart` block.
3. Specify values for the `SOURCE`, `PAIR`, and `INTERVAL` attributes.
4. Save the page and preview it to see the charts.

### News Feed

The `News Feed` block displays the latest news from the custom post type `crypto_news`. It has one attribute:

- `Number of latest news to display` - The number of news items to display.

News items are automatically populated from `TheNewsAPI`. Then the content of the news is sent to ChatGPT for sentiment analysis and a brief summary.

#### Setup and Usage

1. Go to the `crypto_news_settings` settings page.
2. Ensure the API keys are set.
3. Click the `Run Parser` button to fetch the latest three news items.
4. Go to the Gutenberg editor.
5. Add the `News Feed` block.
6. Specify the number of news items to display.
7. Save the page and preview it to see the news.