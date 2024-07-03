# Crypto Blocks Plugin

## Getting Started

Follow these steps to get your demo environment up and running.

### Prerequisites

Ensure the following tools are installed on your system:

- [Docker](https://www.docker.com/)
- [Make]() (This is typically pre-installed on Unix-based systems, but you may need to install it manually on Windows or some Linux distributions)

### Quick Start

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
